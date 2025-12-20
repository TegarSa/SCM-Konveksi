<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Seminar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Whatsapp</th>
            <th>Instansi</th>
            <th>Jabatan</th>
            <th>Provinsi</th>
            <th>Kabupaten</th>
            <th>Kecamatan</th>
            <th>Desa</th>
            <th>Tanggal Pendaftaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $member->training->title }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->number }}</td>
                <td>{{ $member->institution }}</td>
                <td>{{ $member->position }}</td>
                <td>{{ $member->province }}</td>
                <td>{{ $member->district }}</td>
                <td>{{ $member->subdistrict }}</td>
                <td>{{ $member->village }}</td>
                <td>{{ \Carbon\Carbon::parse($member['created_at'])->isoFormat('D MMMM Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
