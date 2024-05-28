<?php

    use Core\Database;
    use Core\Session;
    use Core\Files;
    use Core\Redirect;

    view(HEAD);
    view(NAV);

    $user = Database::query("SELECT * FROM " . USER_TABLE . " WHERE id = ?", [Session::get('user')['id']])->results()[0];

?>


<main>
    <div id="user-setting" class="mx-auto max-w-3xl sm:;px-1 lg:px-1 mt-24 flex justify-center">
        <div class="isolate w-screen h-full border-2 border-gray-500 rounded-md">

            <!-- isolate attribute -->
            <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
                <div class="aspect-[1155/678]"></div>
            </div>

            <!-- header -->
            <div class="flex flex-row py-3 items-center justify-center bg-gray-400 rounded-t-md">
                <h1 class="text-xl text-center font-bold">User Setting</h1>
            </div>

            <!-- form -->
            <form id="form-setting-user" method="POST" class="p-5" enctype="multipart/form-data">
                <div class="grid; grid-cols-2; bg-rose-200; w-full; p-10; gap-y-5">
                    <div class="flex gap-x-10 justify-between">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">

                        <!-- first name -->
                        <div>
                            <label for="first_name" class="block text-sm font-semibold leading-6; text-gray-900">First name</label>
                            <div class="mt-1">
                                <input type="text" name="first_name" id="first-name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name'] ?>" autocomplete="given-name" class="block w-80 rounded-md border-0 px-3.5 py-2 text-gray-90isset($_POST['first_name']) ? $_POST['first_name'] : 0 shadow-sm ring-1 ring-inset ring-gray-300 
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <!-- <p id="output" class="text-red-500 text-xs ml-1"><?= isset($first_name_error) ? $first_name_error : null ?></p> -->
                                <p id="first-name-error" class="text-red-500 text-xs ml-1"></p>
                            </div>
                        </div>

                        <!-- last name -->
                        <div>
                            <label for="last_name" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>
                            <div class="mt-2.5;">
                                <input type="text" name="last_name" id="last-name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name'] ?>" autocomplete="family-name" class="block w-80 rounded-md border-0 px-3.5 py-2 text-gray-900 
                                    shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                    focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <p id="last-name-error" class="text-red-500 text-xs ml-1"></p>
                        </div>
                    </div>

                    <!-- username -->
                    <div class="flex gap-x-10 mt-5 justify-between">
                        <div>
                            <label for="user-name" class="block text-sm font-semibold leading-6 text-gray-900">Username</label>
                            <div class="mt-2.5;">
                                <input type="text" name="username" id="user-name" value="<?= isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" autocomplete="organization" class="block w-80 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm 
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                    focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <p id="user-name-error" class="text-red-500 text-xs ml-1"></p>
                        </div>

                        <!-- email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                            <div class="mt-2.5;">
                                <input readonly type="text" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>" autocomplete="email" class="block w-80 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 
                                    ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                    sm:text-sm sm:leading-6">
                            </div>
                            <p id="email-error" class="text-red-500 text-xs ml-1"></p>
                        </div>
                    </div>

                    <!-- password -->
                    <div class="flex gap-x-10 justify-between mt-5">
                        <div>
                            <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
                            <div class="mt-2.5;">
                                <input type="password" name;="password" id="password" value="<?= substr($user['password'], 0, 5) ?>" autocomplete="password" class="block w-full select-none pointer-events-none rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm 
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                    sm:text-sm sm:leading-6">
                            </div>
                            <p id="password-error" class="text-red-500 text-xs ml-1"></p>
                        </div>

                        <!-- Type old password -->
                        <div class="hidden;">
                            <label for="new_password" class="block text-sm font-semibold leading-6 text-gray-900">Type Old Password</label>
                            <div class="mt-2.5;">
                                <input type="password" name;="old-password" id="old_password" value="" autocomplete="password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                    placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <p id="password-old-error" class="text-red-500 text-xs ml-1"></p>
                        </div>

                        <!-- New password -->
                        <div class="">
                            <label for="new_password" class="block text-sm font-semibold leading-6 text-gray-900">New Password</label>
                            <div class="mt-2.5;">
                                <input type="password" name;="new-password" id="new_password" value="" autocomplete="password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 
                                    ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm 
                                    sm:leading-6">
                            </div>
                            <p id="password-new-error" class="text-red-500 text-xs ml-1"></p>
                        </div>

                        <!-- Password again -->
                        <div class="">
                            <label for="password_again" class="block text-sm font-semibold leading-6 text-gray-900">Again</label>
                            <div class="mt-2.5;">
                                <input type="password" name;="password-again" id="password_again" value="" autocomplete="password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                    placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <p><?= isset($error) ? $error : '' ?></p>
                            </div>
                            <p id="password-again-error" class="text-red-500 text-xs ml-1"></p>
                        </div>
                    </div>


                    <!-- phone number -->
                    <div class="sm:col-span-2 mt-5">
                        <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Phone number</label>
                        <div class="relative mt-2.5;">
                            <input type="text" name="phone_number" id="phone-number" value="<?= isset($_POST['phone_number']) ? $_POST['phone_number'] :  $user['phone_number'] ?>" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20; text-gray-900 shadow-sm 
                                ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <p id="phone-number-error" class="text-red-500 text-xs ml-1"></p>
                    </div>

                    <!-- foto -->
                    <div class="col-span-full mt-5">
                        <label for="foto" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            <img id="image-preview" alt="Preview Image" class="rounded-full w-20 h-20" src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>">
                            <input hidden type="file" name="foto" id="file-input" accept="image/*">
                            <button id="button-image" type="button" disabled; class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Change
                            </button>
                        </div>
                        <p id="foto-error" class="text-red-500 text-xs ml-1"></p>
                    </div>

                </div>

                <!-- button save - cancel -->
                <div class="mt-10 flex justify-center gap-x-10">
                    <a href="/" class="block w-20 rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline   
                        focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Cancel
                    </a>
                    <button type="submit" id="button-save" disabled class="block opacity-70 w-20 rounded-md bg-indigo-600 px-3.5 py-2.5
                         text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline opacity-50
                         focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php view(FOOTER); ?>