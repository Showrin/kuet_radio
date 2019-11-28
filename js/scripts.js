$(document).ready(function() {
    // ################ All Variables ####################
    var radioPlayPauseBtn = $('#js-play-pause-btn');
    var mainPlayer = $('#main-but-hidden-radio-player')[0];
    var themesongPlayer = $('#theme-song-player')[0];
    var isMainPlayerRanFirstTimeAfterPageLoad = true; //1 defines true and 0 for false




    // ################ Main Code #######################
    radioPlayPauseBtn.click(function() {
        playOrPauseFunction(100);
    });




    //################# All Functions ##################### 

    // ############# Function to control play or pause functionality ###########
    function playOrPauseFunction(animationDelay = 100) {
        // ############### Scaling Animation for js-play-pause-btn ################ 
        radioPlayPauseBtn.css('transform', 'scale(.9)');
        setTimeout(function() {
            radioPlayPauseBtn.css('transform', 'scale(1)');
        }, animationDelay);
        
        // ############### changing play & pause button with scaling animation #################
        if(radioPlayPauseBtn.children('span').hasClass('fa-play')) {
            radioPlayPauseBtn.children('span').css('transform', 'scale(0)');
           
            // ########## If play button is hit for the first time sfter page load ##########
            if(isMainPlayerRanFirstTimeAfterPageLoad) {
                mainPlayer.volume = 0;
                isMainPlayerRanFirstTimeAfterPageLoad = false;
                themesongPlayer.play();
            }

            // ########## If themeplayer is paused and not ended ##########
            if(themesongPlayer.paused && !themesongPlayer.ended) {
                themesongPlayer.play();
            }

            mainPlayer.play();

            setTimeout(function() {
                radioPlayPauseBtn.children('span').removeClass('fa-play');
                radioPlayPauseBtn.children('span').addClass('fa-pause');
                radioPlayPauseBtn.children('span').css('transform', 'scale(1)');
            }, animationDelay);

        } else if(radioPlayPauseBtn.children('span').hasClass('fa-pause')) {
            radioPlayPauseBtn.children('span').css('transform', 'scale(0)');
            themesongPlayer.pause();
            mainPlayer.load();
            mainPlayer.pause();
            setTimeout(function() {
                radioPlayPauseBtn.children('span').removeClass('fa-pause');
                radioPlayPauseBtn.children('span').addClass('fa-play');
                radioPlayPauseBtn.children('span').css('transform', 'scale(1)');
            }, animationDelay);

        }
    }



    // ############# Event driven functions ###########
    themesongPlayer.addEventListener('ended', function() {
        mainPlayer.volume = 1; //raising volume to 0 - full of main player after theme song is ended
    });



    // -------------------- get present year --------------------
    function getPresentYear () {
        var date = new Date;
        var presentYear = date.getFullYear();
        return presentYear;
    }

    // -------------------- set present copyright year --------------------
    function setPresentCopyrightYear (selectorID) {
        $(`#${selectorID}`).text(getPresentYear());
    }


    // -------------------- set height of footer according to player ------------------
    function setFooterHeight () {
        
        if ($('.radio-player').height() && $('footer').height()) {
            
            var playerHeight = $('.radio-player').height();
            var footerPresentHeight = $('footer').height();
            var footerFinalHeight;
    
            footerFinalHeight = footerPresentHeight + (playerHeight + 20);
    
            $('footer').height(footerFinalHeight);
        }
    }



    // ------------------- Calling Initial Function -------------------------
    setPresentCopyrightYear('present_copyright_year');
    setFooterHeight();




    // -------------------- Navbar color change on scroll -------------------
    window.onscroll = () => {
        if ($(window).width() > 575.98) { //if it's not a phone or extra small (xs) device  
            if ($('html').scrollTop() > 0) {
                $('.navbar').css({
                    "background-color": "#202427",
                    "box-shadow": "0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)"
                });
            } else {
                $('.navbar').css({
                    "background-color": "transparent",
                    "box-shadow": "none"
                });
            }
        }
    };
    
});