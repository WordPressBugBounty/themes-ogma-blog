/**
 * Combine scripts for Customizer Controls.
 *
 * @package Ogma Blog
 */

( function( api ) {

/*--------------- Upsell ------------------------*/

    api.sectionConstructor['ogma-blog-upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

/*--------------- Tab Control ------------------------*/

    api.Tabs = [];
    api.Tab = api.Control.extend({
        ready: function () {
            var control = this;
            control.container.find('li.section-tab-button').click(function (e) {
                var key = jQuery(this).data('tab');
                e.preventDefault();
                control.container.find('li.section-tab-button').removeClass('active');
                jQuery(this).addClass('active');
                control.toggleActiveControls(key);
            });
            api.Tabs.push(control.id);
        },
        toggleActiveControls: function (key) {
            var control = this,
                currentFields = control.params.choices[key].fields;

            _.each(control.params.fields, function (id) {
                var tabControl = api.control(id);
                if (undefined !== tabControl) {
                    if (tabControl.active() && jQuery.inArray(id, currentFields) >= 0) {
                        tabControl.toggle(true);
                    } else {
                        tabControl.toggle(false);
                    }
                }
            });
        }
    });
    jQuery.extend(api.controlConstructor, {
        'ogma-blog-tabs': api.Tab
    });

    api.bind('ready', function () {
        _.each(api.Tabs, function (id) {
            var control = api.control(id);
            var iniID = control.container.find('li.active').data('tab');
            control.toggleActiveControls(iniID);
        });
    });

/*--------------- Typography Control------------------------*/
    
    api.controlConstructor['ogma-blog-typography'] = api.Control.extend( {
        ready: function() {
            var control = this;
            control.container.on( 'change', '.typography-font-style select', function() {
                control.settings['style'].set( jQuery( this ).val() );
            });
            control.container.on( 'click', '.typography-font-transform input', function() {
                control.settings['transform'].set( jQuery( this ).val() );
            });
            control.container.on( 'change', '.typography-text-decoration select', function() {
                control.settings['text_decoration'].set( jQuery( this ).val() );
            });
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($) {

/*--------------- Custom controls extra -----------*/

    $('.customize-control-select2').select2({
        allowClear: true
    });

/*--------------- Block Repeater-------------------*/

    // collect repeater control field value
    function repeater_value_refresh( _this ) {
        var controlValue = [], container =  _this.parents( ".blocks-repeater-control-wrap" );
        container.find( " > .ogma-blog-block" ).each(function() {
            var newValue = {}, blockName = $(this).attr("block-name");
            newValue['type'] = blockName;
            $(this).find( ".block-repeater-control-field" ).each(function() {
                var fieldValue, fieldName = $(this).data("name");
                if( $(this).attr("type") === 'checkbox' ) {
                    if( $(this).is(":checked") ) {
                        fieldValue = true;
                    } else {
                        fieldValue = false;
                    }
                } else {
                    fieldValue = $(this).val();
                }
                newValue[fieldName] = fieldValue;
            });
            controlValue.push(newValue);
        });
        container.next( ".blocks-repeater-control" ).val( JSON.stringify( controlValue ) ).trigger("change");
    }
    
    // collect repeater field values
    $( ".blocks-repeater-control-wrap" ).on( "change keyup", ".ogma-blog-block .block-repeater-control-field", function() {
        var _this = $(this);
        repeater_value_refresh(_this);
    });

    // display icon field
    $( ".blocks-repeater-control-wrap" ).on( "click", ".block-option", function() {
        var _this = $(this);
        $(this).toggleClass( "dashicons-visibility dashicons-hidden" );
        _this.parents(".ogma-blog-block").toggleClass("ogma-blog-hide");
        $(this).next("input[type='checkbox']").trigger('click');
        if ( _this.hasClass( 'dashicons-hidden' ) ) {
            _this.parents(".ogma-blog-block").find( ".block-content-wrap" ).slideUp( "normal");
        }
        repeater_value_refresh($(this));
    });

    // radio image field
    $( ".blocks-repeater-control-wrap" ).on( "click", ".customize-radio-image-field label", function() {
        var _this = $(this), val = _this.data( "value" );
        _this.addClass( "selected" ).siblings( "label" ).removeClass( "selected" );
        _this.siblings( ".block-repeater-control-field" ).val( val );
        repeater_value_refresh(_this);
    });

    // toggle field
    $( ".blocks-repeater-control-wrap" ).on( "click", ".customize-toggle-field label.toggle-label", function() {
        $(this).parents(".toggle-wrapper").find("input[type='checkbox']").toggleClass("click");
        $(this).parents(".toggle-wrapper").find("input[type='checkbox']").trigger("click");
        repeater_value_refresh($(this));
    });    

    // multicheckbox field
    $( ".customize-multicheckbox-field" ).on( "click, change", ".multicheckbox-content input", function() {
        var _this = $(this), parent = _this.parents( ".customize-multicheckbox-field" ), currentVal, currentFieldVal = parent.find( ".block-repeater-control-field" ).val();
        currentFieldVal = JSON.parse( currentFieldVal );
        currentVal = _this.val();
        if( _this.is(":checked") ) {
            if( currentFieldVal != 'null' ) {
                currentFieldVal.push(currentVal);
            }
        } else {
            if( currentFieldVal != 'null' ) {
                currentFieldVal.splice( $.inArray( currentVal, currentFieldVal ), 1 );
            }
        }
        parent.find( ".block-repeater-control-field" ).val(JSON.stringify(currentFieldVal));
        repeater_value_refresh(_this);
    });

    // clone block
    $( ".blocks-repeater-control-wrap" ).on( "click", ".clone-block", function() {
        var _this = $(this);
        var clonedBlock = _this.prev().clone();
        //clonedBlock.find( ".remove-block" ).show()
        _this.parents(".blocks-repeater-control-wrap").find( ".block-content-wrap" ).slideUp( "normal");
        _this.before( clonedBlock );
        repeater_value_refresh(_this);
    });

    // trigger block content - block content show/hide
    $( ".blocks-repeater-control-wrap" ).on( "click", ".block-settings", function() {
        var _this = $(this), blockOption = _this.parents( ".block-header" ).find('.block-option');
        if ( blockOption.hasClass('dashicons-visibility') ) {
            _this.parents(".ogma-blog-block").find( ".block-content-wrap" ).slideToggle();
        }
    });

    $( ".blocks-repeater-control-wrap" ).on( "click", ".ogma-blog-block .close-block", function() {
        var _this = $(this);
        _this.parents(".ogma-blog-block").find( ".block-content-wrap" ).slideUp( "normal");
    });

    // remove block
    $( ".blocks-repeater-control-wrap" ).on( "click", ".ogma-blog-block .remove-block", function() {
        var _this = $(this), blockelement = _this.parents(".ogma-blog-block"), par = blockelement.siblings( ".clone-block" );
        blockelement.find( ".block-content-wrap" ).slideUp( "normal", function() {
            $(this).parent().remove();
            repeater_value_refresh( par );
        });
        _this.parents(".ogma-blog-block").find( ".block-header-icon i" ).toggleClass( "bx-chevron-up bx-chevron-down" );
    });

    // group wrapper
    $( ".blocks-repeater-control-wrap" ).on( "click", ".block-query-group span", function() {
        var _this = $(this);
        _this.toggleClass( "dashicons-edit dashicons-no-alt" );
        _this.parents('.group-toggle-wrapper').find('.field-group-wrapper').toggle();
    });

    // sortable blocks 
    $(".blocks-repeater-control-wrap").sortable({
        orientation: "vertical",
        items: "> .ogma-blog-block",
        update: function (event, ui) {
            var blockName = $(this).find( ".ogma-blog-block" ).attr('block-name');
            repeater_value_refresh( $(this).find( ".clone-block" ) );
        }
    });

/*--------------- Repeater field ------------------*/

    // function for repeater field
    function ogma_blog_refresh_repeater_values(){
        $(".ogma-blog-repeater-field-control-wrap").each(function(){
            
            var values = [], $this = $(this);
            
            $this.find(".ogma-blog-repeater-field-control").each(function(){
            var valueToPush = {};   

                $(this).find('[data-name]').each(function(){
                    if( $(this).attr('type') === 'checkbox'){
                        dataValue = ( $(this).is(':checked') ) ? 'on' : 'off';
                    } else {
                        var dataValue = $(this).val();
                    }
                    var dataName = $(this).attr('data-name');
                    valueToPush[dataName] = dataValue;
                });

                values.push(valueToPush);
            });

            $this.next('.ogma-blog-repeater-collector').val(JSON.stringify(values)).trigger('change');
        });
    }

    // expand the repeater fields wrap
    $('#customize-theme-controls').on('click','.ogma-blog-repeater-field-title.item-visible', function(){
        $(this).closest('.ogma-blog-repeater-field-control').find('.ogma-blog-repeater-fields').slideToggle();
        $(this).closest('.ogma-blog-repeater-field-control').toggleClass('expanded');
    });

    // close the repeater fields wrap
    $('#customize-theme-controls').on('click', '.ogma-blog-repeater-field-close', function(){
        $(this).closest('.ogma-blog-repeater-fields').slideUp();
        $(this).closest('.ogma-blog-repeater-field-control').toggleClass('expanded');
    });

    // show/hide repeater field
    $("#customize-theme-controls").on("click", ".field-display", function(){
        $(this).toggleClass( "dashicons-visibility dashicons-hidden" );
        $(this).closest('.ogma-blog-repeater-field-control').toggleClass( 'item-visible item-not-visible' );
        $(this).closest('.ogma-blog-repeater-field-control').find('.ogma-blog-repeater-field-title').toggleClass( 'item-visible item-not-visible' );
        var dataVal =  $(this).parents('.ogma-blog-repeater-field-control').find('input.repeater-field-visible-holder').val();
        if(dataVal == 'show') {
            if ($(this).closest('.ogma-blog-repeater-field-control').find('.ogma-blog-repeater-fields').is(':visible')) {
                $(this).closest('.ogma-blog-repeater-field-control').toggleClass('expanded');
                $(this).closest('.ogma-blog-repeater-field-control').find('.ogma-blog-repeater-fields').slideUp();
            }
            $(this).closest('.ogma-blog-repeater-field-control').find('input.repeater-field-visible-holder').val('hide');
        } else {
            $(this).closest('.ogma-blog-repeater-field-control').find('input.repeater-field-visible-holder').val('show');
        }
        ogma_blog_refresh_repeater_values();
    });

    $("body").on("click",'.ogma-blog-repeater-add-control-field', function(){

        var fLimit = $(this).parent().find('.field-limit').val();
        var fCount = $(this).parent().find('.field-count').val();
        if( fCount < fLimit ) {
            fCount++;
            $(this).parent().find('.field-count').val(fCount);
        } else {
            $(this).before('<span class="ogma-blog-limit-msg"><em>Only '+fLimit+' social icons shall be permitted for free version.</em></span>');
            return;
        }

        var $this = $(this).parent();
        
        if(typeof $this != 'undefined') {

            var field = $this.find(".ogma-blog-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){
                
                field.find("input[type='text'][data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find("textarea[data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find("select[data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find(".attachment-media-view").each(function(){
                    var defaultValue = $(this).find('input[data-name]').attr('data-default');
                    $(this).find('input[data-name]').val(defaultValue);
                    if(defaultValue){
                        $(this).find(".thumbnail-image").html('<img src="'+defaultValue+'"/>').prev('.placeholder').addClass('hidden');
                    }else{
                        $(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');   
                    }
                });
                
                field.find(".ogma-blog-repeater-icon-list").each(function(){
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    $(this).prev('.ogma-blog-repeater-selected-icon').children('i').attr('class','').addClass(defaultValue);
                    
                    $(this).find('li').each(function(){
                        var icon_class = $(this).find('i').attr('class');
                        if(defaultValue == icon_class ){
                            $(this).addClass('icon-active');
                        }else{
                            $(this).removeClass('icon-active');
                        }
                    });
                });

                field.find('.ogma-blog-repeater-fields').show();

                $this.find('.ogma-blog-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.ogma-blog-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                ogma_blog_refresh_repeater_values();
            }

        }
        return false;
     });
    
    // remove the repeater field item
    $("#customize-theme-controls").on("click", ".ogma-blog-repeater-field-remove",function(){
        if( typeof  $(this).parent() != 'undefined'){
            $(this).closest('.ogma-blog-repeater-field-control').slideUp('normal', function(){
                $(this).remove();
                ogma_blog_refresh_repeater_values();
            });
        }
        return false;
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]', function(){
        ogma_blog_refresh_repeater_values();
        return false;
    });

    // Drag and drop to change order
    $(".ogma-blog-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        update: function( event, ui ) {
            ogma_blog_refresh_repeater_values();
        }
    });

    // Repeater icon selector
    $('body').on('click', '.ogma-blog-repeater-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.ogma-blog-repeater-icon-list').prev('.ogma-blog-repeater-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.ogma-blog-repeater-icon-list').next('input').val(icon_class).trigger('change');
        ogma_blog_refresh_repeater_values();
    });

    $('body').on('click', '.ogma-blog-repeater-selected-icon', function(){
        $(this).next().slideToggle();
    });

});

/*--------------- Buttonset Control ------------------------*/
    
    wp.customize.controlConstructor['ogma-blog-buttonset'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Change the value
            this.container.on( 'click', 'input', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Dropdown categories Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-dropdown-categories'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            control.container.on( 'change', 'select', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Radio Icons Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-radio-icons'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Change the value
            this.container.on( 'change', 'input', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Radio Images Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-radio-image'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;

            // Change the value
            this.container.on( 'click', 'input', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Range Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-range'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Update the text value
            jQuery("input[type=range]")
                .off()
                .on("input", function () {
                    var range = jQuery(this);
                    var value = range.val();
                    range.siblings("input.ogma-blog-range-input").val(value);
                });
            // Change the text value
            jQuery("input.ogma-blog-range-input")
                .off()
                .on("input", function () {
                    var rangeInput = jQuery(this);
                    var value = rangeInput.val();
                    rangeInput.siblings("input[type=range]").val(value).trigger("input");
                });
            jQuery(".ogma-blog-reset-slider")
                .off()
                .on("click", function () {
                    var range = jQuery(this).parents('.control-wrap').find("input[type=range]");
                    var resetValue = range.data("reset_value");
                    range.val(resetValue).trigger("input");
                });
            // Change the value
            this.container.on("input", "input[type=range]", function () {
                control.setting.set(jQuery(this).val());
            });
        }
    });

/*--------------- Redirect Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-redirect'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            control.container.find('.redirect-item').each(function(){
                var singleItem = jQuery(this);
                singleItem.on('click', function(e){
                    e.preventDefault();
                    var type    = jQuery(this).data('type'),
                        type_id = jQuery(this).data('id');
                    switch( type ) {
                        case 'section' :
                            wp.customize.section(type_id).focus();
                            break;
                        default :
                            wp.customize.control(type_id).focus();
                            break;
                    }
                });
            });
        }
    });

/*--------------- Sortable Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-sortable'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Set the sortable container.
            control.sortableContainer = control.container.find( 'ul.sortable' ).first();
            // Init sortable.
            control.sortableContainer.sortable({
                // Update value when we stop sorting.
                stop: function() {
                    control.updateValue();
                }
            }).disableSelection().find( 'li' ).each( function() {
                // Enable/disable options when we click on the eye of Thundera.
                jQuery( this ).find( 'i.visibility' ).click( function() {
                    jQuery( this ).toggleClass( 'dashicons-visibility dashicons-hidden' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
                });
            }).click( function() {
                // Update value on click.
                control.updateValue();
            });
        },

        /**
         * Updates the sorting list
         */
        updateValue: function() {
            'use strict';
            var control = this,
                newValue = [];
            this.sortableContainer.find( 'li' ).each( function() {
                if ( ! jQuery( this ).is( '.invisible' ) ) {
                    newValue.push( jQuery( this ).data( 'value' ) );
                }
            });
            control.setting.set( newValue );
        }
    });

/*--------------- Toggle Control ------------------------*/

    wp.customize.controlConstructor['ogma-blog-toggle'] = wp.customize.Control.extend({
        ready: function(){
            'use strict';
            var control = this,
                checkboxValue = control.setting._value;
            // Save the value
            this.container.on( 'change', 'input', function() {
                checkboxValue = ( jQuery( this ).is( ':checked' ) ) ? true : false;
                control.setting.set( checkboxValue );
            });
        }
    });

/*--------------- Toggle Control ------------------------*/