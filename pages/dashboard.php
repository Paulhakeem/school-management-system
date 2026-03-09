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

            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap">
                <li class="flex items-center text-sm text-foreground">
                    Application Layout
                    <i class="fa-solid fa-house shrink-0 mx-3 overflow-visible size-2.5 text-muted-foreground"></i>
                </li>
                <li class="text-sm font-semibold text-foreground truncate" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->
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
        <?php include '../components/home.php'; ?>
        <?php include '../components/createStudet.php'; ?>
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
</body>

</html>