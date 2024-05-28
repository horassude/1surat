<?php

    view(DISPOSISI_VIEW, ['surat_masuk' => Core\Database::query("SELECT * FROM " . SURAT_MASUK_TABLE . " ORDER BY tgl_diterima DESC")->results()]);

?>