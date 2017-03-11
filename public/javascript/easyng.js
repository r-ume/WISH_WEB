$.fn.easyng = function(options){

    //////basic settings
    options = $.extend({
        pattern : 'easeInOutBounce',
        dir : '' ,
        distance : '5em' ,
        time : 150 ,
        showSettingData : false
    } , options);

    distanceValue = options.distance.replace(/em/ , '');
    if(distanceValue > 0){options.distance = distanceValue * -1 + 'em';}

    if(options.showSettingData){
        console.log(
            'your selected option is' + '｜' +
            'pattern is ' + options.pattern + '｜' +
            'dir is ' + options.dir + '｜' +
            'disatnce is ' + options.distance + '｜' +
            'time is ' + options.time + '｜'
        );
    }

    this.each(function(){
        $trg = $(this);

        var text = $trg.data('ft');
        length = text.length;

        $trg.hide();

        function mojiWrap(element , index , array){
            mojiNew;
            mojiNew += '<span>' + element + '</span>';
        }

        mojiArg = new Array();
        for(var i=0; i<length; i++){
            mojiArg[i] = text.substr(i,1);
        };

        mojiArg.forEach(mojiWrap);

        var mojiNew = mojiNew.replace(/undefined/ , '');
        $trg.text('').append(mojiNew).find('span').css({
            'opacity' : '0'
        }).end().show();

        if(options.dir !==''){
            $trg.find('span').css({
                'position' : 'relative'
            });
        }
        if(options.dir == 'top'){
            $trg.find('span').css({
                'bottom' : options.distance
            });
        }else if(options.dir=='bottom'){
            $trg.find('span').css({
                'top' : options.distance
            });
        }else if(options.dir == 'left'){
            $trg.find('span').css({
                'right' : options.distance
            });
        }else if(options.dir == 'right'){
            $trg.find('span').css({
                'left' : options.distance
            });
        }

    });

    ////// functions
    function animateDir(target , count){

        var delayCount = options.time * count;

        if(options.dir == 'top'){
            target.delay(delayCount).animate({
                'opacity' : 1 ,
                'top' : 0 ,
                'bottom' : ''
            } , options.pattern);
        }else if(options.dir == 'bottom'){
            target.delay(delayCount).animate({
                'opacity' : 1 ,
                'bottom' : 0 ,
                'top' : ''
            } , options.pattern);
        }else if(options.dir == 'left'){
            target.delay(delayCount).animate({
                'opacity' : 1 ,
                'left' : 0 ,
                'right' : ''
            } , options.pattern);
        }else if(options.dir == 'right'){
            target.delay(delayCount).animate({
                'opacity' : 1 ,
                'right' : 0 ,
                'left' : ''
            } , options.pattern);
        }
    }

    function allMojifade(element){

        setTimeout(function(){
            moji1fade($trg);
        } , 300);

        for(var i=0; i<length; i++){
            mojiAfter1fade($trg , i);
        };
    }
    allMojifade();

    function moji1fade(target){
        var target = target.find('span').eq(0);
        animateDir(target);
    }

    function mojiAfter1fade(target ,countNum){
        var target = target.find('span').eq(countNum);

        animateDir(target , countNum);
    }

    return this;
};

