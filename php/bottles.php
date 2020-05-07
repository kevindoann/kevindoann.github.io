<a href="#" id="back-to-top" title="Back to top">&uarr;</a>

<style>
#back-to-top {
    position: fixed;
    bottom: 40px;
    right: 40px;
    z-index: 9999;
    width: 32px;
    height: 32px;
    text-align: center;
    line-height: 30px;
    background: #f5f5f5;
    color: #444;
    cursor: pointer;
    border: 0;
    border-radius: 2px;
    text-decoration: none;
    transition: opacity 0.2s ease-out;
    opacity: 0;
}
#back-to-top:hover {
    background: #e9ebec;
}
#back-to-top.show {
    opacity: 1;
}
#content {
    height: 2000px;
}
</style>

<script>
console.log("is working")
	if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}
</script>

<div id="content" style="/*background-color:#a7aef6;*/">
	
	<div class = "desc">
		<a target="_blank" href="http://steveturner.la/exhibition/yung-jake-2#1">Hydration</a> is a series of 3d models I worked on with <a target="_blank" href="http://yungjake.com">Yung Jake</a>. The pieces consisted of distorted bottles that were refracted against different images and then printed onto metal canvases. 

	</div>

	<div class="img-holder">

		<img src="imgs/bottles/bench%203_2.jpg">
		<img src="imgs/bottles/T%20Shape.jpg">
		<img src="imgs/bottles/2.jpg">
		<img src="imgs/bottles/three.jpg">
		<img src="imgs/bottles/backwards%20C.jpg">
		<img src="imgs/bottles/pb.jpg">
		<img src="imgs/bottles/table%202.jpg">
        <img src="imgs/bottles/sp.jpg">
        <img src="imgs/bottles/white.jpg">
	</div>

</div>