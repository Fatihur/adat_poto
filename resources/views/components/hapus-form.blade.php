@props(['action', 'pesan' => 'Yakin ingin menghapus data ini?'])

<form method="POST" action="{{ $action }}" onsubmit="return confirm('{{ $pesan }}');" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-danger">Hapus</button>
</form>
