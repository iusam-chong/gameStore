<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    .welcome-section {
        font-family: 'Open Sans', Arial, sans-serif;
        font-weight: 700;
    }

    .welcome-section {
        position: absolute;
        width: 100%;
        height: 94.6%;
        top: 1;
        left: 0;
        background-color: #fff;
        overflow: hidden;
    }

    .welcome-section .content-wrap {
        position: absolute;
        left: 50%;
        top: 45.4%;
        transform: translate3d(-50%, -50%, 0);
    }

    .welcome-section .content-wrap .fly-in-text {
        list-style: none;
    }

    .welcome-section .content-wrap .fly-in-text li {
        display: inline-block;
        margin-right: 30px;
        font-size: 5em;
        color: #000;
        opacity: 1;
        transition: all 2s ease;
    }

    .welcome-section .content-wrap .fly-in-text li:last-child {
        margin-right: 0;
    }

    .welcome-section .content-wrap .enter-button {
        display: block;
        text-align: center;
        font-size: 1em;
        text-decoration: none;
        text-transform: uppercase;
        color: #002f87e1;
        opacity: 1;
        transition: all 1s ease 2s;
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li {
        opacity: 0;
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(1) {
        transform: translate3d(-200px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(2) {
        transform: translate3d(-100px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(3) {
        transform: translate3d(100px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(4) {
        transform: translate3d(200px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .enter-button {
        opacity: 0;
        transform: translate3d(0, -30px, 0);
    }

    /* @media (min-width: 800px) { */
    @media (min-width: 1000px) {
        .welcome-section .content-wrap .fly-in-text li {
            font-size: 10em;
        }

        .welcome-section .content-wrap .enter-button {
            font-size: 1.5em;
        }
    }
</style>

<div class="welcome-section content-hidden">
    <div class="content-wrap">
        <ul class="fly-in-text">
            <li>S</li>
            <li>o</li>
            <li>m</li>
            <li>y</li>
        </ul>
        {{if $userName !== null}}
            <a href="#" class="enter-button">Welcome back, {{$userName}}</a>
        {{else}}
            <a href="#" class="enter-button">Find your game here</a>
        {{/if}}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {

        var welcomeSection = $('.welcome-section'),
            enterButton = welcomeSection.find('.enter-button');

        setTimeout(function() {
            welcomeSection.removeClass('content-hidden');
        }, 250);

        enterButton.on('click', function(e) {
            e.preventDefault();
            welcomeSection.addClass('content-hidden').fadeOut();
            setTimeout(function() { 
                $(location).attr('href', 'shop');
            }, 350);
        });


    });
</script>