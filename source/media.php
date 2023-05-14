<?php
$page_title = 'All Image';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
?>
<?php $media_files = find_all('media');?>
<?php
if(isset($_POST['submit'])) {
    $photo = new Media();
    $photo->upload($_FILES['file_upload']);
    if($photo->process_media()){
        $session->msg('s','photo has been uploaded.');
        redirect('media.php');
    } else{
        $session->msg('d',join($photo->errors));
        redirect('media.php');
    }

}

?>
<?php include_once('layouts/header.php'); ?>

    <div class="title">
        <i class="uil uil-camera-plus"></i>
        <span class="text">All Photos</span>
    </div>

    <?php echo display_msg($msg); ?>

    <form method="post" action="media.php" enctype="multipart/form-data" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

        <span class="text-color">Category Name</span>
        <input type="file" name="file_upload" multiple="multiple" class="block w-90 mt-1 text-sm border-gray text-gray form-input" placeholder="Chose a file">

        <button type="submit" name="submit" class="bg-btn3 px-3 pull-right py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-upload"></i>
            <span>Upload</span>
        </button>

    </form>

    <div class="min-w-0 overflow-hidden rounded-lg shadow-xs">
        <div class="min-w-0 overflow-x-auto">

            <table class="min-w-0 whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-header uppercase border-b dark:border-gray-700 bg-gray-50 alt-color">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Photo</th>
                    <th class="px-4 py-3">Photo Name</th>
                    <th class="px-4 py-3">Photo Type</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="back-color divide-y dark:divide-gray-700 alt-color">
                <?php foreach ($media_files as $media_file): ?>
                <tr class="text-gray text-gray">
                    <td class="px-4 py-3"><?php echo count_id();?></td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img
                                        class="object-cover min-w-0 h-full rounded-full"
                                        src="uploads/products/<?php echo $media_file['file_name'];?>"
                                        alt=""
                                        loading="lazy"
                                >
                                <div
                                        class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"
                                ></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo $media_file['file_name'];?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo $media_file['file_type'];?>
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button
                                    class="bg-btn2 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg text-gray focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete"
                            >
                                <a href="delete_media.php?id=<?php echo (int) $media_file['id'];?>">
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
                                </a>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once('layouts/footer.php'); ?>