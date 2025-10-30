<main class="flex-1 p-6 overflow-y-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Total Households</p>
            <h3 class="text-2xl font-bold text-indigo-600">120</h3>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Registered Users</p>
            <h3 class="text-2xl font-bold text-green-600">512</h3>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Total System Income</p>
            <h3 class="text-2xl font-bold text-green-600">₱4,820,000</h3>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Total Expenses</p>
            <h3 class="text-2xl font-bold text-red-600">₱3,560,000</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Overall Financial Trends</h3>
            <div class="h-64 flex items-center justify-center text-gray-400">
                [System-Wide Income vs Expenses Chart]
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Financial Alerts</h3>
            <ul class="divide-y divide-gray-200">
                <li class="py-3">
                    <span class="font-semibold text-red-600">Family C</span> exceeded monthly budget by ₱5,000.
                </li>
                <li class="py-3">
                    <span class="font-semibold text-yellow-600">Family F</span> nearing expense limit (92%
                    used).
                </li>
                <li class="py-3">
                    <span class="font-semibold text-green-600">Family A</span> achieved ₱12,000 in savings this
                    month.
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Household Financial Status</h3>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b text-gray-500 text-sm">
                    <th class="pb-3">Household</th>
                    <th class="pb-3">Members</th>
                    <th class="pb-3">Income</th>
                    <th class="pb-3">Expenses</th>
                    <th class="pb-3">Savings</th>
                    <th class="pb-3 text-right">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3">Family A</td>
                    <td>4</td>
                    <td>₱60,000</td>
                    <td>₱42,000</td>
                    <td>₱18,000</td>
                    <td class="text-right text-green-600 font-semibold">Stable</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3">Family B</td>
                    <td>5</td>
                    <td>₱35,000</td>
                    <td>₱38,500</td>
                    <td>₱-3,500</td>
                    <td class="text-right text-red-600 font-semibold">Deficit</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-3">Family C</td>
                    <td>3</td>
                    <td>₱50,000</td>
                    <td>₱55,000</td>
                    <td>₱-5,000</td>
                    <td class="text-right text-red-600 font-semibold">Overspent</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 mt-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Admin Activities</h3>
        <ul class="space-y-2 text-sm text-gray-600">
            <li>✅ Approved expense report for Family A (₱42,000)</li>
            <li>⚠️ Flagged Family C for overspending 15% above budget</li>
            <li>🧾 Generated September Summary Report</li>
        </ul>
    </div>
</main>