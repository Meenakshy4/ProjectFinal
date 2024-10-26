$(document).ready(function() {
    loadContent('dashboard');

    $('.nav-link').on('click', function(e) {
        e.preventDefault();
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        const section = $(this).data('section');
        loadContent(section);
    });

    function loadContent(section) {
        if (section === 'dashboard') {
            loadDashboard();
        } else if (section === 'merchandise') {
            loadMerchandise();
        } else if (section === 'sponsors') {
            loadSponsors();
        } else {
            $.post('SahyaAD_PHP.php', {action: 'get', table: section}, function(response) {
                const data = JSON.parse(response);
                let content = `<h2>${section.charAt(0).toUpperCase() + section.slice(1)}</h2>`;
                content += `<table class="table"><thead><tr>`;
                
                // Create table headers
                for (let key in data[0]) {
                    content += `<th>${key.replace('_', ' ').toUpperCase()}</th>`;
                }
                if (section !== 'payments') {
                    content += `<th>Actions</th>`;
                }
                content += `</tr></thead><tbody>`;
                
                // Create table rows
                data.forEach(item => {
                    content += `<tr>`;
                    for (let key in item) {
                        content += `<td>${item[key]}</td>`;
                    }
                    if (section !== 'payments') {
                        content += `<td>
                            <button class="btn btn-sm btn-primary edit-btn" data-id="${item[section + '_id']}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="${item[section + '_id']}">Delete</button>
                        </td>`;
                    }
                    content += `</tr>`;
                });
                
                content += `</tbody></table>`;
                if (section !== 'payments') {
                    content += `<button class="btn btn-success" id="add-btn">Add New</button>`;
                } else {
                    content += `<button class="btn btn-primary" id="download-pdf">Download PDF</button>`;
                }
                
                $('#dashboard-content').html(content);
                
                // Add event listeners for buttons
                $('.edit-btn').on('click', function() {
                    const id = $(this).data('id');
                    editRecord(section, id);
                });
                
                $('.delete-btn').on('click', function() {
                    const id = $(this).data('id');
                    deleteRecord(section, id);
                });
                
                $('#add-btn').on('click', function() {
                    addRecord(section);
                });
    
                $('#download-pdf').on('click', function() {
                    downloadPDF(data);
                });
            });
        }
    }

    function loadDashboard() {
        $.post('SahyaAD_PHP.php', {action: 'dashboard_stats'}, function(response) {
            const stats = JSON.parse(response);
            let content = `
                <h2>Dashboard</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Departments</h5>
                                <p class="card-text">${stats.total_departments}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Total Events</h5>
                                <p class="card-text">${stats.total_events}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Total Registrations</h5>
                                <p class="card-text">${stats.total_registrations}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">Total Payments</h5>
                                <p class="card-text">${stats.total_payments}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            `;
            $('#dashboard-content').html(content);
            
            createDoughnutChart();
            createBarChart();
        });
    }

    function createDoughnutChart() {
        const ctx = document.getElementById('doughnutChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Departments', 'Events', 'Registrations', 'Payments'],
                datasets: [{
                    data: [30, 20, 25, 25],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Distribution'
                }
            }
        });
    }

    function createBarChart() {
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Registrations',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: '#ffc107'
                }, {
                    label: 'Payments',
                    data: [28, 48, 40, 19, 86, 27, 90],
                    backgroundColor: '#dc3545'
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Monthly Activity'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    function deleteRecord(table, id) {
        if (confirm('Are you sure you want to delete this record?')) {
            $.post('SahyaAD_PHP.php', {action: 'delete', table: table, id: id}, function(response) {
                if (JSON.parse(response)) {
                    loadContent(table);
                } else {
                    alert('Error deleting record');
                }
            });
        }
    }

    function addRecord(table) {
        $('#formModalLabel').text('Add New Record');
        $('#recordForm').html('');
        $.post('SahyaAD_PHP.php', {action: 'get_fields', table: table}, function(response) {
            const fields = JSON.parse(response);
            fields.forEach(field => {
                if (field !== `${table}_id`) {
                    $('#recordForm').append(`
                        <div class="form-group">
                            <label for="${field}">${field.replace('_', ' ').toUpperCase()}</label>
                            <input type="text" class="form-control" id="${field}" name="${field}">
                        </div>
                    `);
                }
            });
            $('#saveRecord').data('action', 'add');
            $('#saveRecord').data('table', table);
            $('#formModal').modal('show');
        });
    }

    function editRecord(table, id) {
        $('#formModalLabel').text('Edit Record');
        $('#recordForm').html('');
        $.post('SahyaAD_PHP.php', {action: 'get_record', table: table, id: id}, function(response) {
            const record = JSON.parse(response);
            for (let field in record) {
                if (field !== `${table}_id`) {
                    $('#recordForm').append(`
                        <div class="form-group">
                            <label for="${field}">${field.replace('_', ' ').toUpperCase()}</label>
                            <input type="text" class="form-control" id="${field}" name="${field}" value="${record[field]}">
                        </div>
                    `);
                }
            }
            $('#saveRecord').data('action', 'update');
            $('#saveRecord').data('table', table);
            $('#saveRecord').data('id', id);
            $('#formModal').modal('show');
        });
    }

    $('#saveRecord').on('click', function() {
        const action = $(this).data('action');
        const table = $(this).data('table');
        const id = $(this).data('id');
        const formData = $('#recordForm').serialize();

        $.post('SahyaAD_PHP.php', {
            action: action,
            table: table,
            id: id,
            data: formData
        }, function(response) {
            if (JSON.parse(response)) {
                $('#formModal').modal('hide');
                loadContent(table);
            } else {
                alert('Error saving record');
            }
        });
    });

    function downloadPDF(data) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.text("Participant Names", 10, 10);
        let yPos = 20;
        
        data.forEach((item, index) => {
            doc.text(`${index + 1}. ${item.participant_name}`, 10, yPos);
            yPos += 10;
            if (yPos > 280) {
                doc.addPage();
                yPos = 20;
            }
        });
        
        doc.save("participant_names.pdf");
    }

    // Handle merchandise and sponsors (no database connection)
    let merchandise = [];
    let sponsors = [];

    function loadMerchandise() {
        let content = `<h2>Merchandise</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>`;
        
        merchandise.forEach((item, index) => {
            content += `<tr>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>
                    <button class="btn btn-sm btn-primary edit-merchandise" data-index="${index}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-merchandise" data-index="${index}">Delete</button>
                </td>
            </tr>`;
        });
        
        content += `</tbody></table>
            <button class="btn btn-success" id="add-merchandise">Add Merchandise</button>`;
        
        $('#dashboard-content').html(content);
        
        $('#add-merchandise').on('click', addMerchandise);
        $('.edit-merchandise').on('click', function() {
            editMerchandise($(this).data('index'));
        });
        $('.delete-merchandise').on('click', function() {
            deleteMerchandise($(this).data('index'));
        });
    }

    function addMerchandise() {
        $('#formModalLabel').text('Add Merchandise');
        $('#recordForm').html(`
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
        `);
        $('#saveRecord').data('action', 'add_merchandise');
        $('#formModal').modal('show');
    }

    function editMerchandise(index) {
        $('#formModalLabel').text('Edit Merchandise');
        $('#recordForm').html(`
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="${merchandise[index].name}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="${merchandise[index].price}">
            </div>
        `);
        $('#saveRecord').data('action', 'edit_merchandise');
        $('#saveRecord').data('index', index);
        $('#formModal').modal('show');
    }

    function deleteMerchandise(index) {
        if (confirm('Are you sure you want to delete this merchandise?')) {
            merchandise.splice(index, 1);
            loadMerchandise();
        }
    }

    function loadSponsors() {
        let content = `<h2>Sponsors</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>`;
        
        sponsors.forEach((item, index) => {
            content += `<tr>
                <td>${item.name}</td>
                <td>${item.level}</td>
                <td>
                    <button class="btn btn-sm btn-primary edit-sponsor" data-index="${index}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-sponsor" data-index="${index}">Delete</button>
                </td>
            </tr>`;
        });
        
        content += `</tbody></table>
            <button class="btn btn-success" id="add-sponsor">Add Sponsor</button>`;
        
        $('#dashboard-content').html(content);
        
        $('#add-sponsor').on('click', addSponsor);
        $('.edit-sponsor').on('click', function() {
            editSponsor($(this).data('index'));
        });
        $('.delete-sponsor').on('click', function() {
            deleteSponsor($(this).data('index'));
        });
    }

    function addSponsor() {
        $('#formModalLabel').text('Add Sponsor');
        $('#recordForm').html(`
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control" id="level" name="level">
            </div>
        `);
        $('#saveRecord').data('action', 'add_sponsor');
        $('#formModal').modal('show');
    }

    function editSponsor(index) {
        $('#formModalLabel').text('Edit Sponsor');
        $('#recordForm').html(`
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="${sponsors[index].name}">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control" id="level" name="level" value="${sponsors[index].level}">
            </div>
        `);
        $('#saveRecord').data('action', 'edit_sponsor');
        $('#saveRecord').data('index', index);
        $('#formModal').modal('show');
    }

    function deleteSponsor(index) {
        if (confirm('Are you sure you want to delete this sponsor?')) {
            sponsors.splice(index, 1);
            loadSponsors();
        }
    }

    // Update saveRecord click handler
    $('#saveRecord').on('click', function() {
        const action = $(this).data('action');
        const table = $(this).data('table');
        const id = $(this).data('id');
        const index = $(this).data('index');
        const formData = $('#recordForm').serialize();

        if (action === 'add_merchandise' || action === 'edit_merchandise') {
            const name = $('#name').val();
            const price = $('#price').val();
            if (action === 'add_merchandise') {
                merchandise.push({name, price});
            } else {
                merchandise[index] = {name, price};
            }
            $('#formModal').modal('hide');
            loadMerchandise();
        } else if (action === 'add_sponsor' || action === 'edit_sponsor') {
            const name = $('#name').val();
            const level = $('#level').val();
            if (action === 'add_sponsor') {
                sponsors.push({name, level});
            } else {
                sponsors[index] = {name, level};
            }
            $('#formModal').modal('hide');
            loadSponsors();
        } else {
            $.post('SahyaAD_PHP.php', {
                action: action,
                table: table,
                id: id,
                data: formData
            }, function(response) {
                if (JSON.parse(response)) {
                    $('#formModal').modal('hide');
                    loadContent(table);
                } else {
                    alert('Error saving record');
                }
            });
        }
    });
});