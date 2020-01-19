/**
 * .select2OptionPicker - Convert standard html select into list ui to picker
 *
 * Version: 1.0.0
 * Updated: 2013-10-27
 *
 *  Provides an alternative look and feel for HTML select buttons
 *
 * Author: TienNH (nguyentien8x@gmail.com)
 *
 * Licensed under the MIT
 **/
jQuery.fn.select2OptionPicker = function(options) {
    return this.each(function() {
        var $ = jQuery;
        var select = $(this);
        var multiselect = select.attr('multiple');
        select.hide();

        var buttonsHtml = $('<div class="select2OptionPicker"></div>');
        var selectIndex = 0;
        var addOptGroup = function(optGroup) {
            if (optGroup.attr('label')) {
                buttonsHtml.append('<strong>' + optGroup.attr('label') + '</strong>');
            }
            var ulHtml = $('<ul class="select-buttons">');
            optGroup.children('option').each(function() {
                var img_src = $(this).data('img-src');
                var color = $(this).data('color');
				if(color){
					var img;
					if(color == "Black") img = "frame_black.jpg";
					if(color == "Black Matrix") img = "black.jpg";
					if(color == "Warm Grey") img = "frame_warm_gray.jpg";
					if(color == "White") img = "frame-white.jpg";
					if(color == "Cherry Woodgrain") img = "cherry.jpg";
					if(color == "Grey Matrix") img = "grey.jpg";
					if(color == "Maple Woodgrain") img = "maple.jpg";
					if(color == "White") img = "white.jpg";
					if(color == "Silver") img = "silver.jpg";
					if(color == "Honey Stain") img = "honey.jpg";
					if(color == "Walnut Stain") img = "walnut.jpg";
					if(color == "Espresso Stain") img = "espresso.jpg";
					img_src = "/pub/media/attribute/swatch/thumb/" + img ;
					color = null;
				}
                var liHtml = $('<li></li>');
                if ($(this).attr('disabled') || select.attr('disabled')) {
                    liHtml.addClass('disabled');
                    liHtml.append('<span>' + $(this).html() + '</span>');
                } else {

                    if (color) {
                        liHtml.append('<a href="#" style="background-color:' + color + '" data-select-index="' + selectIndex + '">&nbsp;</a>');
                    } else if (img_src) {
                        liHtml.append('<a href="#" data-select-index="' + selectIndex + '" style="padding:0;height:44px;"><img class="image_picker" src="' + img_src + '" style="width: 40px;"></a>');
                    } else {
                        liHtml.append('<a href="#" data-select-index="' + selectIndex + '">' + $(this).html() + '</a>');
                    }
                }

                // Mark current selection as "picked"
                if ((!options || !options.noDefault) && $(this).attr('selected')) {
                    liHtml.children('a, span').addClass('picked');
                }
                ulHtml.append(liHtml);
                selectIndex++;
            });
            buttonsHtml.append(ulHtml);
        }

        var optGroups = select.children('optgroup');
        if (optGroups.length == 0) {
            addOptGroup(select);
        } else {
            optGroups.each(function() {
                addOptGroup($(this));
            });
        }

        select.after(buttonsHtml);

        buttonsHtml.find('a').click(function(e) {
            e.preventDefault();
            var clickedOption = $(select.find('option')[$(this).attr('data-select-index')]);
			console.log(clickedOption);
            if (multiselect) {
                if (clickedOption.attr('selected')) {
                    $(this).removeClass('picked');
                    clickedOption.removeAttr('selected');
                } else {
                    $(this).addClass('picked');
                    clickedOption.attr('selected', 'selected');
                }
            } else {
                if ($(this).hasClass('picked')) {
                    $(this).removeClass('picked');
                    clickedOption.removeAttr('selected');
                } else {
                    buttonsHtml.find('a, span').removeClass('picked');
                    $(this).addClass('picked');
                    clickedOption.attr('selected', 'selected');
                }
            }
            select.trigger('change');
        });
    });
};
