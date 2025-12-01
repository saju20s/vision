<script src="{{ asset('backend/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/toastr.min.js') }}"></script>
<script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<!-- summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>


<script>
    document.addEventListener('livewire:init', () => {
        toastr.options = {
            "closeButton": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        window.addEventListener('toastr:success', e => toastr.success(e.detail.message));
        window.addEventListener('toastr:error', e => toastr.error(e.detail.message));
        window.addEventListener('toastr:warning', e => toastr.warning(e.detail.message));
    });
</script>





<script>
    $(document).ready(function() {
        // Header JS Code=========================================================== //
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                // Mobile: toggle visibility
                sidebar.classList.toggle('show');
            } else {
                // Desktop: collapse/expand
                // sidebar.classList.toggle('collapsed');
                // document.querySelector('.content').classList.toggle('collapsed');
            }
        });


        // Sidebar Toogle JS code======================================================= //
        window.toggleDropdown = function(id) {
            const menu = document.getElementById(id);
            menu.classList.toggle('open');
        };


        //delete Btn=======================================================================//
        $('.dlt-btn').on('click', function() {
            var id = $(this).data('id');
            $('#itemId').val(id);

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });

                    $('#deleteForm').submit();
                }
            });
        });

        //Image Preview JS Code=================================================================//
        const fImageInput = document.getElementById('fImage');
        const previewImg = document.getElementById('feature_img');
        const removeIcon = document.querySelector('.za-removeimg');

        fImageInput.addEventListener('change', function(e) {
            const [file] = e.target.files;

            if (file) {
                previewImg.src = URL.createObjectURL(file);
                previewImg.classList.remove('d-none');
                removeIcon.classList.remove('d-none');
            } else {
                previewImg.src = '';
                previewImg.classList.add('d-none');
                removeIcon.classList.add('d-none');
            }
        });

        removeIcon.addEventListener('click', function() {
            fImageInput.value = '';
            previewImg.src = '';
            previewImg.classList.add('d-none');
            removeIcon.classList.add('d-none');
        });
















        // JS Code END 

    });

    // Login JS Code***********************************************************************************//
    function togglePassword(fieldId, iconSpan) {
        const field = document.getElementById(fieldId);
        const icon = iconSpan.querySelector('i');

        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            field.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }
</script>


<script>
    function initScrollArrow() {
        const sidebar = document.getElementById('sidebar');
        const scrollArrow = document.getElementById('scroll-arrow');

        if (!sidebar || !scrollArrow) return;

        scrollArrow.addEventListener('click', function() {
            sidebar.scrollBy({
                top: 200,
                behavior: 'smooth'
            });
        });

        sidebar.addEventListener('scroll', function() {
            const atBottom = sidebar.scrollTop + sidebar.clientHeight >= sidebar.scrollHeight - 5;
            if (atBottom) {
                scrollArrow.classList.add('hide');
            } else {
                scrollArrow.classList.remove('hide');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        initScrollArrow();
    });

    window.addEventListener('livewire:navigated', () => {
        initScrollArrow();
    });
</script>



<script>
    function attachProfilePasswordToggle() {
        const showProfileForm = document.getElementById('showProfileForm');
        const showPasswordForm = document.getElementById('showPasswordForm');
        const profileForm = document.getElementById('profileForm');
        const passwordForm = document.getElementById('passwordForm');

        // যদি কোনো DOM element না থাকে, তাহলে ফাংশন না চালিয়ে ফেরত যাও
        if (!showProfileForm || !showPasswordForm || !profileForm || !passwordForm) return;

        showProfileForm.onclick = function(e) {
            e.preventDefault();
            profileForm.style.display = 'block';
            passwordForm.style.display = 'none';
            showProfileForm.classList.replace('btn-outline-primary', 'btn-primary');
            showPasswordForm.classList.replace('btn-primary', 'btn-outline-primary');
        }

        showPasswordForm.onclick = function(e) {
            e.preventDefault();
            passwordForm.style.display = 'block';
            profileForm.style.display = 'none';
            showPasswordForm.classList.replace('btn-outline-primary', 'btn-primary');
            showProfileForm.classList.replace('btn-primary', 'btn-outline-primary');
        }
    }

    // প্রথমবার DOM ready হলে চালাও
    document.addEventListener('DOMContentLoaded', () => {
        attachProfilePasswordToggle();
    });

    // Livewire 3 navigation/render হলে আবার attach করো
    document.addEventListener('livewire:navigated', () => {
        attachProfilePasswordToggle();
    });

    document.addEventListener('livewire:initialized', () => {
        attachProfilePasswordToggle();
    });
</script>
