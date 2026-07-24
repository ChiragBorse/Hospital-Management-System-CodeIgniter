
<?php

<div class="content-wrapper">
    <section class="content-header">
        <h1>Bill Master</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-success" onclick="showModal()">Add Bill</button>
            </div>
            <div class="box-body">
                <table id="billTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Bill Modal -->
<div id="billModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bill Form</h4>
            </div>
            <div class="modal-body">
                <form id="billForm">
                    <input type="hidden" id="bill_id" name="bill_id">
                    <div class="form-group">
                        <label>Patient Name</label>
                        <input type="text" id="patient_name" name="patient_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="bill_date" name="bill_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>

<script>
$(document).ready(function() {
    loadBills(); // Load data on page load

    $("#billForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var url = $("#bill_id").val() ? "<?= base_url('BillMaster/update') ?>" : "<?= base_url('BillMaster/add') ?>";

        $.post(url, formData, function(response) {
            $("#billModal").modal("hide");
            loadBills();
            alert(response);
        });
    });
});

function loadBills() {
    $.get("<?= base_url('BillMaster/fetch') ?>", function(data) {
        $("#billTable tbody").html(data);
    });
}

function showModal(id = "") {
    if (id) {
        $.get("<?= base_url('BillMaster/edit/') ?>" + id, function(data) {
            var bill = JSON.parse(data);
            $("#bill_id").val(bill.id);
            $("#patient_name").val(bill.patient_name);
            $("#amount").val(bill.amount);
            $("#bill_date").val(bill.bill_date);
        });
    } else {
        $("#billForm")[0].reset();
    }
    $("#billModal").modal("show");
}

function deleteBill(id) {
    if (confirm("Are you sure?")) {
        $.post("<?= base_url('BillMaster/delete/') ?>" + id, function(response) {
            loadBills();
            alert(response);
        });
    }
}
</script>
