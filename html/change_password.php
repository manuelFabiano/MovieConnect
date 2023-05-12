<?session_start();
if(isset($_SESSION['username'])){?>

<head>
    <title>MovieConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
<div class="min-h-screen flex flex-col justify-center sm:py-12">
  <div class="p-10  mx-auto">
    <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
      <div class="px-5 py-7">
        <form action="/db/update_password.php" method="POST">
          
          <label for="oldpassword" class="font-semibold text-sm text-gray-600 pb-1 block">Vecchia password</label>
          <input autocomplete="off" type="password" name="oldpassword" id="oldpassword" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          
          <label for="password" class="font-semibold text-sm text-gray-600 pb-1 block">Nuova assword</label>
          <input type="password" name="password" id="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          
          <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600  text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
              <span class="inline-block mr-2">Aggiorna password</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
          </button>
        </form>
        </div>
        <div class="py-5">
        <div class="grid grid-cols-2 gap-1">
          <div class="text-center whitespace-nowrap">
          <button type="button" onclick="location.href='<?echo $_SERVER['HTTP_REFERER'];?>'" class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-200 ring-inset">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="inline-block ml-1">Torna alla pagina precedente</span>
            </button>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<?}?>