$(document).ready(function() {
    function loadSuppliers() {
        $.ajax({
            url: "<?= site_url('supplier/get_all_suppliers') ?>",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var tableBody = $("#supplierTableBody");
                tableBody.empty();

                data.forEach(function(item) {
                    var row = `<tr>
                        <td>${item.id}</td>
                        <td>${item.nama_supplier}</td>
                        <td>${item.status}</td>
                        <td>${item.created_at}</td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-btn" data-id="${item.id}">Edit</button>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">Delete</button>
                        </td>
                    </tr>`;
                    tableBody.append(row);
                });

                $(".delete-btn").click(function(){
                    var id = $(this).data('id');
                    if (confirm('Are you sure you want to delete this record?')) {
                        $.ajax({
                            url: "<?= site_url('supplier/delete/') ?>" + id,
                            type: "POST",
                            dataType: "json",
                            success: function(response) {
                                if (response.status === 'success') {
                                    loadSuppliers();
                                } else {
                                    alert(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                                alert("An error occurred while deleting data. Error: " + error);
                            }
                        });
                    }
                });

                $(".edit-btn").click(function(){
                    var id = $(this).data('id');
                    $.ajax({
                        url: "<?= site_url('supplier/edit/') ?>" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#edit_id").val(data.id);
                            $("#edit_nama_supplier").val(data.nama_supplier);
                            $("#edit_status").val(data.status);
                            $('#editSupplierModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            alert("An error occurred while fetching data. Error: " + error);
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert("Failed to load data. Error: " + error);
            }
        });
    }

    $("#addSupplierForm").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "<?= site_url('supplier/store') ?>",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $('#addSupplierModal').modal('hide');
                    $('#addSupplierForm')[0].reset();
                    loadSuppliers();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert("An error occurred while adding data. Error: " + error);
            }
        });
    });

    $("#editSupplierForm").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "<?= site_url('supplier/update') ?>",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $('#editSupplierModal').modal('hide');
                    $('#editSupplierForm')[0].reset();
                    loadSuppliers();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert("An error occurred while updating data. Error: " + error);
            }
        });
    });

    loadSuppliers();
});
