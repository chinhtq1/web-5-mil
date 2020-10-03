<!-- Main Footer -->
<footer class="main-footer" style="display: block">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <p>Version {{ app_version() }}</p>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ app_name() }}</a>.</strong> {{ trans('strings.backend.general.all_rights_reserved') }}
</footer>
