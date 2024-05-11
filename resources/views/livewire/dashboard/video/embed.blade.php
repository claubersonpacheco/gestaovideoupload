<div>
    <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Copiar código embed</h1>
            </div>

            <div class="mt-5" wire:ignore>
                <input type="text" value="Hello World" id="myInput">
                <button onclick="myFunction()">Copy text</button>
                <script>
                    function myFunction() {
                        // Get the text field
                        var copyText = document.getElementById("myInput");

                        // Select the text field
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); // For mobile devices

                        // Copy the text inside the text field
                        navigator.clipboard.writeText(copyText.value);

                        // Alert the copied text
                        alert("Copied the text: " + copyText.value);
                    }
                </script>


            </div>

            <!-- End Form -->
        </div>
    </div>
</div>




