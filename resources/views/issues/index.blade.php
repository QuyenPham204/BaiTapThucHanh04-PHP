<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sự Cố</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f7fd; /* Màu nền xanh nhạt */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 900px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            text-align: center;
            padding: 1rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-primary {
            background-color: #28a745; /* Màu nút "Thêm Sự Cố" */
            color: white;
            padding: 0.75rem 1.5rem;
        }

        .btn-primary:hover {
            background-color: #218838; /* Màu nút khi hover */
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            color: #333;
        }

        .btn-danger {
            background-color: #dc3545; /* Màu nút xóa */
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333; /* Màu nút xóa khi hover */
        }

        .btn-warning {
            background-color: #ffc107; /* Màu nút cảnh báo */
            color: white;
        }

        .btn-warning:hover {
            background-color: #e0a800; /* Màu nút cảnh báo khi hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh Sách Sự Cố</h1>

        <div class="card">
            <div class="card-header">
                <h5>Danh Sách Các Sự Cố</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('issues.create') }}" class="btn btn-primary">Thêm Sự Cố</a>
                </div>

                <!-- Bảng danh sách sự cố -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Người Báo Cáo</th>
                            <th>Ngày Báo Cáo</th>
                            <th>Mô Tả</th>
                            <th>Mức Độ</th>
                            <th>Trạng Thái</th>
                            <th>Máy Tính</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $index => $issue)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $issue->reported_by }}</td>
                            <td>{{ $issue->reported_date }}</td>
                            <td>{{ $issue->description }}</td>
                            <td>{{ $issue->urgency }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>{{ $issue->computer->computer_name }} ({{ $issue->computer->model }})</td>
                            <td>
                                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Chỉnh Sửa</a>
                                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
