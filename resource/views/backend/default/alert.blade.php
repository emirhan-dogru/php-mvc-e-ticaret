@if (isset($_GET['durum']) && isset($_GET['mesaj']))
<div class="alert {{ $_GET['durum'] == 'hata' ? 'alert-danger' : 'alert-success' }} text-center small">
    {{ $_GET['mesaj'] }}
</div>
@endif