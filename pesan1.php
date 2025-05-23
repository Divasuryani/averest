<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan averess </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <style>
        
        #newMessageSection {
            display: none;
        }

       
        #newMessageCheckbox:checked+#newMessageSection {
            display: block;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="w-96 bg-white rounded-lg shadow-md h-[600px] overflow-y-auto">
        
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
            <button class="text-gray-700 text-lg font-semibold">Pesan</button>
            <button class="text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        
        <div class="divide-y divide-gray-200 px-4 py-3">
            <a href="pesan2.php">
                
                <label class="flex items-center px-4 py-3 mb-3 hover:bg-gray-100 rounded-lg cursor-pointer">
                    <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m0 0l4 4m-4-4L5 4" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold text-gray-700">Pesan baru</p>
                    </div>
                </label>
            </a>

            
            <a href="undang-teman.php" class="flex items-center px-4 py-3 mb-3 hover:bg-gray-100 rounded-lg">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 15h6m-6 0v2a2 2 0 002 2h2a2 2 0 002-2v-2m0 0v-2m0 0H9m6 0a2 2 0 002-2V8a2 2 0 00-2-2H9a2 2 0 00-2 2v3a2 2 0 002 2m6 0v2m-6 0v2" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-gray-700">Undang teman-teman Anda</p>
                    <p class="text-xs text-gray-500">Hubungkan untuk mulai mengobrol</p>
                </div>
            </a>
        </div>
    </div>

    
    <input type="checkbox" id="newMessageCheckbox" class="hidden">
    <div id="newMessageSection" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg w-96">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">Pesan Baru</h2>
                <label for="newMessageCheckbox" class="cursor-pointer text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>
            <div class="mt-4">
                <textarea class="w-full h-32 border border-gray-300 rounded-lg p-3"
                    placeholder="Tulis pesan Anda..."></textarea>
            </div>
            <div class="mt-4 flex justify-end">
                <button class="bg-blue-500 text-white py-2 px-4 rounded-lg">Kirim</button>
            </div>
        </div>
    </div>

</body>

</html>