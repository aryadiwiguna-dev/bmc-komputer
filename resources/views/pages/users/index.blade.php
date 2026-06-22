@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
  <div>
    <h4 class="mb-3 mb-md-0">Kelola Pengguna (Staff & Admin)</h4>
  </div>
  <div>
    <button class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addUserModal">
      <i class="btn-icon-prepend icon-sm" data-lucide="plus"></i> Tambah Pengguna
    </button>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if($errors->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $errors->first('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="usersTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Hak Akses (Role)</th>
                <th>Status Akun</th>
                <th width="200px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="w-30px h-30px rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center fw-bold me-2">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                      </div>
                      <span class="fw-bold">{{ $user->name }}</span>
                    </div>
                  </td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <span class="badge {{ $user->role === 'admin' ? 'bg-primary' : 'bg-info' }}">
                      {{ ucfirst($user->role) }}
                    </span>
                  </td>
                  <td>
                    <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                      {{ $user->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                    </span>
                  </td>
                  <td>
                    <div class="d-flex gap-1">
                      <button class="btn btn-xs btn-outline-warning edit-user-btn" data-user="{{ json_encode($user) }}">
                        <i class="icon-sm" data-lucide="edit-2"></i> Edit
                      </button>
                      
                      @if(auth()->id() !== $user->id)
                        <form action="{{ route('users.toggle', $user->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-xs {{ $user->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success' }}">
                            @if($user->status === 'active')
                              <i class="icon-sm" data-lucide="user-x"></i> Nonaktifkan
                            @else
                              <i class="icon-sm" data-lucide="user-check"></i> Aktifkan
                            @endif
                          </button>
                        </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: I Made Kasir" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat Email</label>
            <input type="email" name="email" class="form-control" placeholder="Contoh: kasir@bmc.com" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter..." required>
          </div>
          <div class="mb-3">
            <label class="form-label">Hak Akses (Role)</label>
            <select name="role" class="form-select" required>
              <option value="kasir">Kasir (Transaksi & Katalog)</option>
              <option value="admin">Admin (Akses Penuh)</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="me-1 icon-sm" data-lucide="user-plus"></i> Simpan Pengguna</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editUserForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="edit_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat Email</label>
            <input type="email" name="email" id="edit_email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password Baru (Biarkan kosong jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control" placeholder="Ketik password baru jika ingin diubah...">
          </div>
          <div class="mb-3">
            <label class="form-label">Hak Akses (Role)</label>
            <select name="role" id="edit_role" class="form-select" required>
              <option value="kasir">Kasir</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="me-1 icon-sm" data-lucide="check-circle"></i> Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('build/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('build/plugins/datatables.net/dataTables.min.js') }}"></script>
  <script src="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize DataTable
    $('#usersTable').DataTable({
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "Semua"]
      ],
      "iDisplayLength": 10,
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ data",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ pengguna",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 pengguna",
        "infoFiltered": "(disaring dari _MAX_ total pengguna)",
        "zeroRecords": "Tidak ada pengguna yang cocok ditemukan",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Berikutnya",
          "previous": "Sebelumnya"
        }
      }
    });

    // 2. Edit User modal popup trigger
    const editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
    const editForm = document.getElementById('editUserForm');
    
    document.querySelectorAll('.edit-user-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const user = JSON.parse(this.dataset.user);
        
        // Populate inputs
        document.getElementById('edit_name').value = user.name;
        document.getElementById('edit_email').value = user.email;
        document.getElementById('edit_role').value = user.role;

        // Set action dynamically
        editForm.action = `/users/${user.id}`;

        editModal.show();
      });
    });
  });
</script>
@endpush
