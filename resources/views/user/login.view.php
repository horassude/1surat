<?php
    
    view(HEAD);
    view(NAV);

?>


<main>
    <div id="user-login" class="mx-auto max-w-xl sm:px-2 lg:px-3 mt-40 flex">
        <div class="isolate w-screen h-full border-2 border-gray-500 py-10 rounded-md">

            <!-- isolate attribute -->
            <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
                <div class="aspect-[1155/678]"></div>
            </div>

            <!-- logo -->
            <div>
                <img class="mx-auto w-20" src="<?= image(LOGO_POLRI) ?>" alt="Your Company">
            </div>

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-7 text-center text-xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <form id="form-login-user" class="space-y-6 mt-10" method="POST">
            <!-- <form id="form-login-user" class="space-y-6 mt-10" action="/user/login" method="POST"> -->
                <!-- <input type="hidden" name="_method" value="POST"> -->
                <div class="sm:mx-auto sm:w-full sm:max-w-sm space-y-5">

                    <!-- email -->
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email / Username</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="text" value="<?= $_POST['email'] ?? null ?>" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <p id="email-username-error" class="ml-1 text-rose-600 text-xs"><?= isset($email_username_error) ? $email_username_error : null ?></p>
                    </div>

                    <!-- password -->
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" value="<?= $_POST['password'] ?? null ?>" class="block w-full p-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                
                        </div>
                        <p class="ml-1 text-rose-600 text-xs"><?= isset($password_error) ? $password_error : null ?></p>
                        <p id="password-error" class="ml-1 text-rose-600 text-xs"></p>
                    </div>

                    <!-- button login cancel -->
                    <div class="flex gap-x-10 pt-10">
                        <a href="/" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Cancel
                        </a>
                        <button type="submit" id="button-signin" disabled class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 opacity-50 focus-visible:outline-indigo-600">
                            Sign in
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>


<script>
     const inputs = document.querySelectorAll('input');
     const buttonSignin = document.getElementById("button-signin")

     inputs.forEach(function(input) {
        input.addEventListener("input", function(i) {
            buttonSignin.disabled = false
            buttonSignin.style.opacity = 1
        })
     })
</script>

<?php view(FOOTER); ?>