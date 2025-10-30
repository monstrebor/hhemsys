<main class="flex-1 p-6 overflow-y-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Total Income</p>
            <h3 class="text-2xl font-bold text-green-600">₱85,000</h3>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Total Expenses</p>
            <h3 class="text-2xl font-bold text-red-600">₱42,300</h3>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Savings</p>
            <h3 class="text-2xl font-bold text-indigo-600">₱12,700</h3>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-gray-500">Monthly Budget Remaining</p>
            <h3 class="text-2xl font-bold text-yellow-600">₱29,000</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Monthly Expense Trend</h3>
            <div class="h-64 flex items-center justify-center text-gray-400">
                [Chart will appear here]
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Households Overview</h3>
            <ul class="divide-y divide-gray-200">
                <li class="py-3 flex justify-between">
                    <span>Family A</span>
                    <span class="font-semibold text-green-600">₱58,200 Balance</span>
                </li>
                <li class="py-3 flex justify-between">
                    <span>Family B</span>
                    <span class="font-semibold text-red-600">₱-3,500 Deficit</span>
                </li>
                <li class="py-3 flex justify-between">
                    <span>Family C</span>
                    <span class="font-semibold text-green-600">₱12,000 Savings</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Transactions</h3>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b text-gray-500 text-sm">
                    <th class="pb-3">Date</th>
                    <th class="pb-3">Category</th>
                    <th class="pb-3">Description</th>
                    <th class="pb-3 text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3">Oct 24, 2025</td>
                    <td>Food & Groceries</td>
                    <td>Supermarket shopping</td>
                    <td class="text-right text-red-600">-₱2,350</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3">Oct 23, 2025</td>
                    <td>Utilities</td>
                    <td>Electric Bill</td>
                    <td class="text-right text-red-600">-₱1,500</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-3">Oct 20, 2025</td>
                    <td>Salary</td>
                    <td>Monthly Income</td>
                    <td class="text-right text-green-600">₱25,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>