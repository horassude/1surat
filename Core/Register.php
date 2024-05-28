<?php

    namespace Core;
    use Core\Database;

    class Register
    {
        private static $instance = null,
                       $table,
                       $post,
                       $surat;
        public $user_level;

        private function __construct()
        {
            self::$surat = Database::query("SELECT * FROM " . SURAT_MASUK_TABLE);
        }

        private static function init()
        {
            if (!isset(self::$instance)) {
                self::$instance = new Register();
            }
            return self::$instance;
        }

        public static function delete()
        {            
            return Database::delete(SURAT_MASUK_TABLE, ['id', '=', Input::get('id')]);
        }

        public static function update()
        {
            $id = Input::post('id');
            Input::delete('id');

            return Database::update(SURAT_MASUK_TABLE, Input::post(), ['id', '=', $id]);
        }

        public static function create()
        {
            self::init();
            
            if(Input::files() !== null) {
                if(!Input::files('error')) {
                    Input::add('surat_pdf', file_get_contents(Input::files('tmp_name')));
                }
            }
            
            // d(Input::post());
            // dateFormat(Input::post('tgl_diterima'));
            // Input::set('tgl_surat', dateFormatEN(Input::post('tgl_surat')));
            // Input::set('tgl_diterima', Input::post('tgl_diterima'));
            
            Database::insert(SURAT_MASUK_TABLE, Input::post());
            
            $id = Database::query("SELECT id FROM " . SURAT_MASUK_TABLE . " ORDER BY id DESC LIMIT 1")->results()[0]['id'];
           
            self::registrasi_surat($id);

            self::send_message_to('admin');
        }


        private static function registrasi_surat($id) 
        {   
            $field_updated = ['no_registrasi' => no_register($id, Input::post('tgl_surat'))];
            $conditions = ['id', '=', $id];
            
            Database::update(SURAT_MASUK_TABLE, $field_updated, $conditions);
        }


        private static function send_message_to($recipient) {

            $surat = Database::query("SELECT * FROM " . SURAT_MASUK_TABLE . " ORDER BY id DESC LIMIT 1")->results()[0];
            $pengirim = $surat['pengirim'];
            $jenis_surat = $surat['jenis_surat'];

            $input = [
                'message' => $jenis_surat . ' dari ' . $pengirim,
                'tanggal' => date('Y-m-d H:i:s'),
                'pengirim' => Session::get('user')['username'],
                'penerima' => $recipient,
                'seen' => 0,
                'id_surat_masuk' => $surat['id']
            ];
          

            return Database::insert(MESSAGES_TABLE, $input);

        }


        public static function get(array $fields = null, array $conditions = null)
        {
            $surat = Database::get(SURAT_MASUK_TABLE, $fields, $conditions);
            
            if($surat->count()) {
                return $surat->results(); 
            } else {
                return 'No data';
            }
        
        }

    }