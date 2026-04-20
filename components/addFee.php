<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Add Fee Content    -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-6">Add Fee</h1>
        <form action="#" method="POST" class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label for="student" class="block text-gray-700 font-medium mb-2">Select Student</label>
                <select id="student" name="student" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="">-- Select a student --</option>
                    <!-- Dynamically populate students here -->
                    <option value="1">John Doe</option>
                    <option value="2">Jane Smith</option>
                </select>
            </div>
            <!-- fee -->
            <div class="flex justify-between mb-4">
                <div class="w-1/2 mr-2">
                    <label for="fee_amount" class="block text-gray-700 font-medium mb-2">Fee Amount</label>
                    <input type="number" id="fee_amount" name="fee_amount" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Enter fee amount">
                </div>
                <div class="w-1/2 ml-2">
                    <label for="due_date" class="block text-gray-700 font-medium mb-2">Due Date</label>
                    <input type="date" id="due_date" name="due_date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                </div>
            </div>
            <!-- mpesa code -->
            <div class="mb-4">
                <label for="mpesa_code" class="block text-gray-700 font-medium mb-2">M-Pesa Code</label>
                <input type="text" id="mpesa_code" name="mpesa_code" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Enter M-Pesa code">
            </div>

            <!-- total fee and fee balance -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <!-- Total Fee -->
                <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Total Fee
                        </h2>
                        <div class="bg-blue-100 text-blue-600 p-2 rounded-full">
                            💰
                        </div>
                    </div>

                    <p class="mt-4 text-2xl font-bold text-gray-800">Ksh50,000</p>
                </div>

                <!-- Fee Balance -->
                <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Fee Balance
                        </h2>
                        <div class="bg-red-100 text-red-600 p-2 rounded-full">
                            ⚠️
                        </div>
                    </div>

                    <p class="mt-4 text-2xl font-bold text-red-600">Ksh20,000</p>
                </div>
            </div>

            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md transition duration-200 font-medium">Add Fee</button>
        </form>
</body>

</html>