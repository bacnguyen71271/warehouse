{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components.js')) }}"></script>
@if($configData['blankPage'] == false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/footer.js')) }}"></script>
<script src="{{ asset(mix('js/jquery.toast.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script>
    $('.notification_item').click(function(e){  
        var self = this; 
        e.isDefaultPrevented();
        $.ajax({
            type: 'POST',
            url: '{{ url('notifistt') }}',
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            data: {
                 'id': $(self).attr('data'),
                },
                dataType: 'json',
                success: function (data) {
                    if (data.status) {
                        window.location.href = $(self).attr('href');
                    }
                }
            });
    })
</script>
<style>
    a.notification_item.no-read {
        background-color: aliceblue;
    }
</style>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
