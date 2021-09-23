<script type="text/javascript">
        $( document ).ready(function() {
            $('.page-loader').attr('hidden',"true");
        });
</script>

<div class="page-loading page-loader page-loader-logo" style="align-items: center; justify-content: center;">
        <img class="img-fluid" alt="{{ config('app.name') }}" src="{{ asset('media/logos/Hércules Logo.png') }}" style="width: 400px;" />
        <div class="spinner spinner-primary"></div>
</div>
