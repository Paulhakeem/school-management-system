<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
include '../includes/students.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../components/header.php'; ?>

<body>
    <div class="sticky top-0 inset-x-0 z-20 bg-black border-y border-navbar-line px-4 sm:px-6 lg:px-8 lg:hidden">
        <div class="flex items-center py-2">
            <!-- Navigation Toggle -->
            <button type="button" class="size-8 flex justify-center items-center gap-x-2 bg-layer border border-layer-line text-layer-foreground hover:text-layer-foreground-hover rounded-lg focus:outline-hidden focus:text-layer-foreground-focus disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                    <path d="M15 3v18" />
                    <path d="m8 9 3 3-3 3" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- sidebar -->
    <?php include '../components/sidebar.php' ?>
    <!-- End Content -->
    </div>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        <?php
        if ($page == 'home') {
            include '../components/home.php';
        } elseif ($page == 'create_student') {
            include '../components/createStudet.php';
        } elseif ($page == 'view_students') {
            include '../components/viewStudents.php';
        } elseif ($page == 'attendance') {
            echo '<h1 class="text-2xl font-bold">Attendance</h1><p>Attendance management coming soon.</p>';
        } elseif ($page == 'fees') {
            echo '<h1 class="text-2xl font-bold">Fees</h1><p>Fees management coming soon.</p>';
        } elseif ($page == 'add_fee') {
            include '../components/addFee.php';
        } elseif ($page == 'classes') {
            include '../components/classes.php';
        } elseif ($page == 'add_class') {
            include '../components/addClass.php';
        } else {
            include '../components/home.php'; // default
        }
        ?>
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
</body>

</html>