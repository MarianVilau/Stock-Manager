<?php
$page_title = 'All sale';
require_once('includes/load.php');
page_require_level(3);
?>
<?php
$sales = find_all_sale();
?>
<?php include_once('layouts/header.php'); ?>

<div class="title">
    <i class="uil uil-bill"></i>
    <span class="text">All Sales</span>
</div>
<button type="submit" name="add_cat" class="bg-btn3 pull-right px-3 py-2 rescale2 rounded-lg focus:outline-none focus:shadow-outline-gray">
    <i class="uil uil-plus"></i>
    <a href="add_sale.php">Add Sale</a>
</button>

<div class="min-w-0 overflow-hidden rounded-lg shadow-xs">
    <div class="min-w-0 overflow-x-auto">


        <table class="min-w-0 whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-header uppercase border-b dark:border-gray-700 bg-gray-50 alt-color">
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Client</th>
                <th class="px-4 py-3">Amount</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody class="back-color divide-y dark:divide-gray-700 alt-color">
            <tr class="text-gray text-gray">
                <td class="px-4 py-3"> 1</td>
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <!-- Avatar with inset shadow -->
                        <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                        >
                            <img
                                class="object-cover min-w-0 h-full rounded-full"
                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                        </div>
                        <div>
                            <p class="font-semibold">Hans Burger</p>
                            <p class="text-xs text-gray text-gray">
                                10x Developer
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm">
                    $ 863.45
                </td>
                <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          Approved
                        </span>
                </td>
                <td class="px-4 py-3 text-sm">
                    6/10/2020
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                        <button
                            class="bg-btn1 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg text-gray focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                            </svg>
                        </button>
                        <button
                            class="bg-btn2 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg text-gray focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
