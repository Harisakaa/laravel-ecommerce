!function(e){"use strict";if(e(".menu-item.has-submenu .menu-link").on("click",function(s){s.preventDefault(),e(this).next(".submenu").is(":hidden")&&e(this).parent(".has-submenu").siblings().find(".submenu").slideUp(200),e(this).next(".submenu").slideToggle(200)}),e("[data-trigger]").on("click",function(s){s.preventDefault(),s.stopPropagation();var n=e(this).attr("data-trigger");e(n).toggleClass("show"),e("body").toggleClass("offcanvas-active"),e(".screen-overlay").toggleClass("show")}),e(".screen-overlay, .btn-close").click(function(s){e(".screen-overlay").removeClass("show"),e(".mobile-offcanvas, .show").removeClass("show"),e("body").removeClass("offcanvas-active")}),e(".btn-aside-minimize").on("click",function(){window.innerWidth<768?(e("body").removeClass("aside-mini"),e(".screen-overlay").removeClass("show"),e(".navbar-aside").removeClass("show"),e("body").removeClass("offcanvas-active")):e("body").toggleClass("aside-mini")}),e(".select-nice").length&&e(".select-nice").select2(),e("#offcanvas_aside").length){const e=document.querySelector("#offcanvas_aside");new PerfectScrollbar(e)}e(".darkmode").on("click",function(){e("body").toggleClass("dark")})}(jQuery);





document.addEventListener('DOMContentLoaded', function () {
    const inputs = ['harga_modal', 'harga_jual', 'harga_beli'];

    inputs.forEach(function(id) {
        const input = document.getElementById(id);

        input.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, '');
            this.value = formatNumber(value);
        });

        input.closest('form').addEventListener('submit', function () {
            input.value = input.value.replace(/\D/g, '');
        });
    });

    function formatNumber(number) {
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
});


function previewImages(event) {
    const placeholder = document.getElementById('upload-placeholder');
    const previewContainer = document.getElementById('image-preview-container');
    previewContainer.innerHTML = '';

    const files = event.target.files;
    if (files.length > 0) {
        placeholder.style.display = 'none';

        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
                img.style.marginRight = '10px';
                img.style.marginBottom = '10px';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    } else {
        placeholder.style.display = 'block';
    }
}