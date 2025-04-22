<?php

ob_start();
?>
<div class="page__container flex flex-col justify-center items-center">
    <!-- error messages -->
    <?php if (isset($_GET['error'])) : ?>
    <div class="error-message text-red-900 py-2">
        <?php echo htmlspecialchars((string) $_GET['error']); ?>
    </div>
    <?php endif;?>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register on our platform.</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="/register" method="POST" id="registration-form" class="space-y-6">
        <div>
            <label for="username" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div class="mt-2">
            <input type="text" 
                name="username" 
                id="username" 
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                autocomplete="usernaem" 
                required
                value="<?php echo isset($_GET["username"]) ? htmlspecialchars((string) $_GET["username"]) : '';  ?>" >
                <?php if (isset($errors['username'])): ?> 
                    <p class="text-red-500 font-bold text-sm mt-2 whitespace-normal"><?= $errors['username'] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
            <input type="email" 
                name="email" 
                id="email" 
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                autocomplete="email" 
                value="<?php echo isset($_GET["email"]) ? htmlspecialchars((string) $_GET["email"]) : '' ?>"
                required 
                >
                <?php if (isset($errors['email'])): ?> 
                    <p class="text-red-500 font-bold text-sm mt-2 whitespace-normal"><?= htmlspecialchars((string) $errors['email']) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="text-sm">
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>
            </div>
            <div class="mt-2">
            <input type="password" 
                name="password" 
                id="password" 
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                autocomplete="current-password" 
                required
                >
                <?php if (isset($errors['password'])): ?> 
                    <p class="text-red-500 font-bold text-sm mt-2 whitespace-normal"><?= htmlspecialchars((string) $errors['password']) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
        Already have an account? 
        <a href='/login' class="font-semibold text-indigo-600 hover:text-indigo-500">Log in</a>
        </p>
    </div>
    </div>

</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.view.php';
?>