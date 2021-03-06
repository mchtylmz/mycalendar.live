/*
Template: Calendify - Responsive Bootstrap 4 Admin Dashboard Template
Author: iqonicthemes.in
Design and Developed by: iqonicthemes.in
NOTE: This file contains the styling for responsive Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------

:: Tooltip
:: Fixed Nav
:: Ripple Effect
:: Sidebar Widget
:: FullScreen
:: Page Loader
:: Counter
:: Progress Bar
:: Page Menu
:: Close  navbar Toggle
:: user toggle
:: Data tables
:: Form Validation
:: Active Class for Pricing Table
:: Flatpicker
:: Scrollbar
:: checkout
:: Datatables
:: image-upload
:: video
:: Button
:: Pricing tab

------------------------------------------------
Index Of Script
----------------------------------------------*/

(function(jQuery) {



    "use strict";

    jQuery(document).ready(function() {

        /*---------------------------------------------------------------------
        Tooltip
        -----------------------------------------------------------------------*/
        jQuery('[data-toggle="popover"]').popover();
        jQuery('[data-toggle="tooltip"]').tooltip();

        /*---------------------------------------------------------------------
        Fixed Nav
        -----------------------------------------------------------------------*/

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.iq-top-navbar').addClass('fixed');
            } else {
                $('.iq-top-navbar').removeClass('fixed');
            }
        });

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.white-bg-menu').addClass('sticky-menu');
            } else {
                $('.white-bg-menu').removeClass('sticky-menu');
            }
        });

        /*---------------------------------------------------------------------
        Ripple Effect
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', ".iq-waves-effect", function(e) {
            // Remove any old one
            jQuery('.ripple').remove();
            // Setup
            let posX = jQuery(this).offset().left,
                posY = jQuery(this).offset().top,
                buttonWidth = jQuery(this).width(),
                buttonHeight = jQuery(this).height();

            // Add the element
            jQuery(this).prepend("<span class='ripple'></span>");


            // Make it round!
            if (buttonWidth >= buttonHeight) {
                buttonHeight = buttonWidth;
            } else {
                buttonWidth = buttonHeight;
            }

            // Get the center of the element
            let x = e.pageX - posX - buttonWidth / 2;
            let y = e.pageY - posY - buttonHeight / 2;


            // Add the ripples CSS and start the animation
            jQuery(".ripple").css({
                width: buttonWidth,
                height: buttonHeight,
                top: y + 'px',
                left: x + 'px'
            }).addClass("rippleEffect");
        });

       /*---------------------------------------------------------------------
        Sidebar Widget
        -----------------------------------------------------------------------*/

        jQuery(document).on("click", '.iq-menu > li > a', function() {
            jQuery('.iq-menu > li > a').parent().removeClass('active');
            jQuery(this).parent().addClass('active');
        });

        // Active menu
        var parents = jQuery('li.active').parents('.iq-submenu.collapse');

        parents.addClass('show');


        parents.parents('li').addClass('active');
        jQuery('li.active > a[aria-expanded="false"]').attr('aria-expanded', 'true');

        /*---------------------------------------------------------------------
        FullScreen
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.iq-full-screen', function() {
            let elem = jQuery(this);
            if (!document.fullscreenElement &&
                !document.mozFullScreenElement && // Mozilla
                !document.webkitFullscreenElement && // Webkit-Browser
                !document.msFullscreenElement) { // MS IE ab version 11

                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
            elem.find('i').toggleClass('ri-fullscreen-line').toggleClass('ri-fullscreen-exit-line');
        });


        /*---------------------------------------------------------------------
        Page Loader
        -----------------------------------------------------------------------*/
        jQuery("#load").fadeOut();
        jQuery("#loading").delay().fadeOut("");


        /*---------------------------------------------------------------------
        Counter
        -----------------------------------------------------------------------*/
        if (window.counterUp !== undefined) {
            const counterUp = window.counterUp["default"]
            const $counters = $(".counter");
            $counters.each(function (ignore, counter) {
                var waypoint = new Waypoint( {
                    element: $(this),
                    handler: function() {
                        counterUp(counter, {
                            duration: 1000,
                            delay: 10
                        });
                        this.destroy();
                    },
                    offset: 'bottom-in-view',
                } );
            });
        }


        /*---------------------------------------------------------------------
        Progress Bar
        -----------------------------------------------------------------------*/
        jQuery('.iq-progress-bar > span').each(function() {
            let progressBar = jQuery(this);
            let width = jQuery(this).data('percent');
            progressBar.css({
                'transition': 'width 2s'
            });

            setTimeout(function() {
                progressBar.appear(function() {
                    progressBar.css('width', width + '%');
                });
            }, 100);
        });

        jQuery('.progress-bar-vertical > span').each(function () {
            let progressBar = jQuery(this);
            let height = jQuery(this).data('percent');
            progressBar.css({
                'transition': 'height 2s'
            });
            setTimeout(function () {
                progressBar.appear(function () {
                    progressBar.css('height', height + '%');
                });
            }, 100);
        });



        /*---------------------------------------------------------------------
        Page Menu
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.wrapper-menu', function() {
            jQuery(this).toggleClass('open');
        });

        jQuery(document).on('click', ".wrapper-menu", function() {
            jQuery("body").toggleClass("sidebar-main");
        });


        /*---------------------------------------------------------------------
        user toggle
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.iq-user-toggle', function() {
            jQuery(this).parent().addClass('show-data');
        });

        jQuery(document).on('click', ".close-data", function() {
            jQuery('.iq-user-toggle').parent().removeClass('show-data');
        });
        jQuery(document).on("click", function(event){
        var $trigger = jQuery(".iq-user-toggle");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            jQuery(".iq-user-toggle").parent().removeClass('show-data');
        }
        });
        /*-------hide profile when scrolling--------*/
        jQuery(window).scroll(function () {
            let scroll = jQuery(window).scrollTop();
            if (scroll >= 10 && jQuery(".iq-user-toggle").parent().hasClass("show-data")) {
                jQuery(".iq-user-toggle").parent().removeClass("show-data");
            }
        });
        let Scrollbar = window.Scrollbar;
        if (jQuery('.data-scrollbar').length) {

            Scrollbar.init(document.querySelector('.data-scrollbar'), { continuousScrolling: false });
        }



        /*---------------------------------------------------------------------
        Form Validation
        -----------------------------------------------------------------------*/

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);

      /*---------------------------------------------------------------------
       Active Class for Pricing Table
       -----------------------------------------------------------------------*/
      jQuery("#my-table tr th").click(function () {
        jQuery('#my-table tr th').children().removeClass('active');
        jQuery(this).children().addClass('active');
        jQuery("#my-table td").each(function () {
          if (jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active')
          }
        });
        var col = jQuery(this).index();
        jQuery("#my-table tr td:nth-child(" + parseInt(col + 1) + ")").addClass('active');
      });

        /*------------------------------------------------------------------
        Flatpicker
        * -----------------------------------------------------------------*/
      if (jQuery.fn.flatpickr !== undefined) {
          if (jQuery('.basicFlatpickr').length > 0) {
              jQuery('.basicFlatpickr').flatpickr();
          }

          if (jQuery('#inputTime').length > 0) {
              jQuery('#inputTime').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
          }
          if (jQuery('#inputDatetime').length > 0) {
              jQuery('#inputDatetime').flatpickr({
                enableTime: true
            });
          }
          if (jQuery('#inputWeek').length > 0) {
              jQuery('#inputWeek').flatpickr({
                weekNumbers: true
            });
          }
          if (jQuery('#inline-date').length > 0) { 
              jQuery("#inline-date").flatpickr({
                inline: true
            });
          }
          if (jQuery('#inline-date1').length > 0) {
              jQuery("#inline-date1").flatpickr({
                inline: true
            });
          }
      }

        /*---------------------------------------------------------------------
        Scrollbar
        -----------------------------------------------------------------------*/

        jQuery(window).on("resize", function () {
            if (jQuery(this).width() <= 1299) {
                jQuery('#salon-scrollbar').addClass('data-scrollbar');
            } else {
                jQuery('#salon-scrollbar').removeClass('data-scrollbar');
            }
        }).trigger('resize');

        jQuery('.data-scrollbar').each(function () {
            var attr = $(this).attr('data-scroll');
            if (typeof attr !== typeof undefined && attr !== false){
            let Scrollbar = window.Scrollbar;
            var a = jQuery(this).data('scroll');
            Scrollbar.init(document.querySelector('div[data-scroll= "' + a + '"]'));
            }
        });


         /*---------------------------------------------------------------------
           Datatables
        -----------------------------------------------------------------------*/
        if(jQuery('.data-tables').length)
        {
          $('.data-tables').DataTable();
        }

        if ($.fn.select2 !== undefined) {
            $("#single").select2({
                placeholder: "Select a Option",
                allowClear: true
            });
            $("#multiple").select2({
                placeholder: "Select a Multiple Option",
                allowClear: true
            });
            $("#multiple2").select2({
                placeholder: "Select a Multiple Option",
                allowClear: true
            });
        }

        /*---------------------------------------------------------------------
        Pricing tab
        -----------------------------------------------------------------------*/
        jQuery(window).on('scroll', function (e) {

            // Pricing Pill Tab
            var nav = jQuery('#pricing-pills-tab');
            if (nav.length) {
                var contentNav = nav.offset().top - window.outerHeight;
                if (jQuery(window).scrollTop() >= (contentNav)) {
                    e.preventDefault();
                    jQuery('#pricing-pills-tab li a').removeClass('active');
                    jQuery('#pricing-pills-tab li a[aria-selected=true]').addClass('active');
                }
            }
        });


        /*---------- */
        $(".dropdown-menu li a").click(function(){
            var selHtml = $(this).html();
            var selName = $.trim($(this).text());
            var titleName = $.trim($(this).find('h6').text());
            if (titleName) selName = titleName;
            var titleID = $(this).find('h6').data('id');
            if (!titleID) {
                titleID = 'other';
            }
            $(this).parents('.btn-group').find('.search-replace').html(selHtml);
            $(this).parents('.btn-group').find('.search-query').val(selName);
            showDetail(titleID);
            if($("input[name=location_id").length <= 0) {
                $(this).prepend('<input type="hidden" name="location_id">');
            }
            $("input[name=location_id").val(titleID);
          });

        function hideDetails() {
            $('.location-detail').addClass('d-none').hide();
            $(".location-detail").each(function(index, element) {
                $(this).find('input').removeAttr('required');
                $(this).find('textarea').removeAttr('required');
            });
        }

        function showDetail(element) {
            hideDetails();
            let elm = $('#' + element);
            elm.removeClass('d-none').show();
            elm.find('input').attr('required','required');
            elm.find('textarea').attr('required','required');
            elm.find('input').each(function (index, element) {
                if ($(this).attr('type') == 'hidden') {
                    $(this).removeAttr('required');
                }
            });
        }

        /*---------------------------------------------------------------------
        List and Grid
        -----------------------------------------------------------------------*/
        $('.list-grid-toggle').click(function() {
            var txt = $(".icon").hasClass('icon-grid') ? 'List' : 'Grid';
            $('.icon').toggleClass('icon-grid');
            $(".label").text(txt);
          })
          
          $('[data-toggle="pill"]').on('click',function () {
              const extra = $(this).attr('data-extra')
              if (extra !== undefined) {
                  $('.tab-extra').removeClass('active')
                  $(extra).addClass('active')
              }
          })

        $('[data-toggle="pill"]').on('click',function () {
            const extra = $(this).attr('data-extras')
            if (extra !== undefined) {
                $('.filter-extra').removeClass('active')
                $(extra).addClass('active')
            }
        })

        $('[data-placement="daterange"]').daterangepicker({
            opens: 'center'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        $('[data-input="daterange"]').daterangepicker({
            opens: 'center',
            // minDate: moment(),
            // minYear: parseInt(moment().format('YYYY')),
            // maxYear: parseInt(moment().add(5, 'years').format('YYYY')),
            locale: {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Uygula",
                "cancelLabel": "Vazge??",
                "fromLabel": "Dan",
                "toLabel": "a",
                "customRangeLabel": "Se??",
                "daysOfWeek": [
                    "Pt",
                    "Sl",
                    "??r",
                    "Pr",
                    "Cm",
                    "Ct",
                    "Pz"
                ],
                "monthNames": [
                    "Ocak",
                    "??ubat",
                    "Mart",
                    "Nisan",
                    "May??s",
                    "Haziran",
                    "Temmuz",
                    "A??ustos",
                    "Eyl??l",
                    "Ekim",
                    "Kas??m",
                    "Aral??k"
                ],
                "firstDay": 1
            },
        }, function (start, end, label) {
            let next = $('[data-input="daterange"]').next();
            if (next.attr('name') == 'start_date') {
                next.val(start.format('YYYY-MM-DD'));
            }
            if (next.next().attr('name') == 'end_date') {
                next.next().val(end.format('YYYY-MM-DD'));
            }
        });

        $('#view-event').on('click', function(e) {
            e.preventDefault()
            $('#view-btn').tab('show');
        })



        $(document).on('click', '[data-extra-toggle="copy"]', function (e) {
            e.preventDefault()
            $(this).attr("title", "Copied!").tooltip("_fixTitle").tooltip("show").attr("title", "Copy to clipboard").tooltip("_fixTitle");
            const input = $(this).data("input")
            copyToClipboard($(input).val())

        })

        $(document).on('click', '[data-extra-toggle="random-text"]', function (e) {
            e.preventDefault()
            const length = $(this).data('length')
            const input = $(this).data('input')
            const target = $(this).data('target')
            const value = random(length)
            $(input).val(value)
            $(target).html(value)
        })

        // Goto workflow page
        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = '#' +urlParams.get('activeTab');
        if ($(activeTab).length > 0) {
            $(activeTab).tab('show')
        }


        function random(length) {
            let result = ''
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
            const charactersLength = characters.length
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength))
            }
            return result
        }

        function copyToClipboard(value) {
            const elem = $("<input>")
            $("body").append(elem);
            elem.val(value).select();
            document.execCommand("copy");
            elem.remove();
        }

        $(document).on('change', '.card-change', function (e) {
            $(this).closest('.event-detail').find('.dropdown').addClass('d-none')
            $(this).closest('.event-detail').addClass('disabled')
            $(this).closest('.event-detail').find('.copy').addClass('d-none')
            $(this).closest('.event-detail').find('.turn-on').removeClass('d-none')
            $(this).closest('.event-detail').find('.card-change').prop('checked', true);
        })

        $(document).on('click', '.turn-on', function(e){
            e.preventDefault()
            $(this).closest('.event-detail').find('.copy').removeClass('d-none')
            $(this).closest('.event-detail').find('.card-change').prop('checked', false);
            $(this).closest('.event-detail').removeClass('disabled')
            $(this).closest('.event-detail').find('.dropdown').removeClass('d-none')
            $(this).addClass('d-none')
        })
    });

    // calender 1 js
  var calendar1;
    if (jQuery('#calendar1').length) {
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar1');
            calendar1 = new FullCalendar.Calendar(calendarEl, {
                selectable: true,
                plugins: ["timeGrid", "dayGrid", "list", "interaction"],
                timeZone: "UTC+3",
                minTime: "07:00",
                maxTime: "24:00",
                defaultView: "listWeek",
                contentHeight: "auto",
                eventLimit: true,
                dayMaxEvents: 4,
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                },
                dateClick: function (info) {},
                eventClick: function(event, element) {
                    let eventDetail = event.event;
                    $('#event_title').html(eventDetail.title);
                    $('#event_start').html(moment(eventDetail.start).format('DD.MM.YYYY H:mm'));
                    $('#event_end').html(moment(eventDetail.end).format('DD.MM.YYYY H:mm'));
                    $('#event_location').html(eventDetail.extendedProps.location);
                    $('#event_category').html(eventDetail.extendedProps.category);
                    $('#event_owner').html(eventDetail.extendedProps.owner);
                    $('#event_link').attr('href', eventDetail.extendedProps.route);
                    $('#date-event').modal('show');
                },
                locale: 'tr',
                editable: true,
                allDaySlot: false,
                slotEventOverlap: true,
                nowIndicator: true,
                noEventsMessage: 'G??sterilecek Etkinlik Bulunamad??!..',
                events: {
                    url: _base_url + 'api/events',
                    method: 'GET',
                    error: function () {
                        alert('Bilinmeyen hata olu??tu, daha sonra tekrar deneyiniz!..');
                    },
                }
            });
            calendar1.render();
        });
    }

    // clockpicker
    $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'Tamam'
    });

    // Enable all tooltips
    $('[data-toggle="tooltip"]').tooltip();
    // quill
    if (jQuery("#editor").length) {
        new Quill('#editor', {theme: 'snow'});
    }
    // With Tooltip
    if (jQuery("#quill-toolbar").length) {
        new Quill('#quill-toolbar', { modules: { toolbar: '#quill-tool' }, placeholder: 'Compose an epic...', theme: 'snow' });
        // Can control programmatically too
        $('.ql-italic').mouseover();
        setTimeout(function() {
            $('.ql-italic').mouseout();
        }, 2500);
    }

    const readURL = function(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    window.minDate = function(date, element) {
        let min = $('#' + date).val();
        $('#' + element).attr('min', min);
    }

    window.eventRemove = function (event_id, event_title, action) {
        Swal.fire({
            type: 'question',
            title: "Siliniyor?",
            text: event_title + " etkinli??i siliniyor, onayl??yor musunuz? Bu i??lemin geri d????n?????? olmayabilir!.",
            showCancelButton: true,
            dangerMode: true,
            cancelButtonText: 'Vazge??',
            cancelButtonClass: '#DD6B55',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Sil!',
        }).then((willDelete) => {
            if (willDelete.value) {
                $('body').append("<form class='form-inline remove-form' method='post' action='" + action + "'></form>");
                $('body').find('.remove-form').append('<input name="'+_csrfname+'" type="hidden" value="'+_csrftoken+'">');
                $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+event_id+'">');
                $('body').find('.remove-form').submit();
            }
        });
    }

    window.messageRemove = function (comment_id, action) {
        Swal.fire({
            type: 'question',
            title: "Siliniyor?",
            text: "Mesaj siliniyor, onayl??yor musunuz? Bu i??lemin geri d????n?????? olmayabilir!.",
            showCancelButton: true,
            dangerMode: true,
            cancelButtonText: 'Vazge??',
            cancelButtonClass: '#DD6B55',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Sil!',
        }).then((willDelete) => {
            if (willDelete.value) {
                $('body').append("<form class='form-inline remove-form' method='post' action='" + action + "'></form>");
                $('body').find('.remove-form').append('<input name="'+_csrfname+'" type="hidden" value="'+_csrftoken+'">');
                $('body').find('.remove-form').append('<input name="comment_id" type="hidden" value="'+comment_id+'">');
                $('body').find('.remove-form').submit();
            }
        });
    }

    $('form#subscribe').submit(function(e){
        var $this = $(this);    // reference to the current scope
        var confirm_msg = 'Etkinli??e kat??l??yorum, onayl??yor musunuz?';

        var action = $this.find("input[name=action]").val();
        if (action == 'left') {
            confirm_msg = 'Etkinli??e kat??lmayaca????m, onayl??yor musunuz?';
        }
        if (action == 'left_by_owner') {
            confirm_msg = '??ye etkinlikten ????kar??lacakt??r, onayl??yor musunuz?';
        }
        if (action == 'join_by_owner') {
            confirm_msg = '??yenin etkinli??e kat??lmas?? onaylanacakt??r, i??leme devam edilsin mi?';
        }

        var btn_submit = $this.find("button[type=submit]");
        btn_submit.attr('subscribe', '1');
        if (confirm(confirm_msg)) {
            btn_submit.removeAttr('subscribe');
            return true;
        }

        btn_submit.removeAttr('disabled').html(btn_submit.attr('prev-text'));
        return false;
    });

    $("form").submit(function () {
        var btn_submit = "button[type=submit]";
        if ($(this).find(btn_submit).attr('subscribe') == undefined) {
            $(btn_submit)
            .attr('prev-text', $.trim($(btn_submit).text()))
            .attr('disabled', 'disabled')
            .html('<i class="fas fa-spinner fa-pulse"></i>');
        }

        if (document.querySelector('#editor')) {
            let myEditor = document.querySelector('#editor');
            if ($(this).find('textarea[name=content]').length <= 0) {
                $(this).append('<textarea style="display:none" name="content"></textarea>');
            }
            $(this).find('textarea[name=content]').val(myEditor.children[0].innerHTML);
        }
    });

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $('#copyLink').click(function (e) {
        e.preventDefault();
        var copyText = $(this).attr('href');

        document.addEventListener('copy', function (e) {
            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        }, true);

        document.execCommand('copy');

        Swal.fire({
            icon: 'info',
            title: 'Link Kopyaland??!',
            showConfirmButton: false,
            timer: 1500
        })

        return false;
    });

    $('.notification-bell').click(function (e) {
        if ($(this).data('count')) {
            $.get(_base_url + 'api/notifications/read');
        }
    });

    $(".upload-button").on('click', function() {
       $(".file-upload").trigger('click');
    });

})(jQuery);
