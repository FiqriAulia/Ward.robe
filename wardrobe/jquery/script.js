$(() => {
    $('.wizard').delay(3000).fadeOut('slow', () => {
        $('body').css('background-color', '#F5CB5C');
        window.location.href = 'home.php';
    });
    $(document).ready(function () {
        $('.button').click(function () {
            window.location.href = 'v_menu.php';
            $('.sleep').fadeOut('slow');
            $('.wake').fadeIn('slow');
        });
    });
    $(document).ready(function () {
        $('#egg').click(function () {
            $.ajax({
                url: 'wardrobe.txt',
                dataType: 'text',
                success: function (data) {
                    console.log(data);
                },
                error: function () {
                    console.log('Error loading file.');
                }
            });
        });
    });
    $(document).ready(function () {
        $('h2').click(function () {
            var textClicked = $(this).text();

            window.location.href = 'v_' + textClicked.toLowerCase() + '.php';
        });
    });
    $(document).ready(function () {
        $('h4').click(function () {
            var classClicked = $(this).attr('class');

            if (classClicked) {
                window.location.href = 'v_laundri[ed]/' + classClicked.toLowerCase() + '.php';
            } else {
                console.log('Elemen h4 tidak memiliki class.');
            }
        });
    });
    document.addEventListener('mousemove', (e) => {
        const mouseX = e.clientX;
        const mouseY = e.clientY;
        console.log(e)
        const anchor = document.getElementById('anchor');
        const rekt = anchor.getBoundingClientRect();
        const anchorX = rekt.left + rekt.width / 2;
        const anchorY = rekt.top + rekt.height / 2;
        const angleDeg = angle(mouseX, mouseY, anchorX, anchorY);
        console.log(angleDeg);

        const eyes = document.querySelectorAll('.eye');
        eyes.forEach(eye => {
            eye.style.transform = `rotate(${90 + angleDeg}deg)`;
        });
    });
    function angle(cx, cy, ex, ey) {
        var dy = ey - cy;
        var dx = ex - cx;
        const rad = Math.atan2(dy, dx);
        const deg = rad * 180 / Math.PI;
        return deg;
    }
    $(document).ready(function () {
        $('.foto').each(function () {
            var srcValue = $(this).attr('src');
            if (srcValue && srcValue === "gambar/" || srcValue === "../gambar/") {
                $(this).hide();
            }
        });
    });
    $(document).ready(function () {
        var clickCount = 0;
        $('#anchor').click(function () {
            clickCount++;
            if (clickCount === 3) {
                window.location.href = 'home.php';
            }
        });
    });
    $(document).ready(function () {
        var eggClickCount = 0;

        $('#egg').click(function () {
            eggClickCount++;

            if (eggClickCount === 3) {
                window.location.href = 'wardrobe.php';
            }
        });
    });
});
