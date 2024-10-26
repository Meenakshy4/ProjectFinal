// SahyaDD_JS.js

class SahyaDashboard {
    constructor() {
        this.contentContainer = document.getElementById('dashboard-content');
        this.setupEventListeners();
    }

    setupEventListeners() {
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => this.handleNavClick(e));
        });

        this.contentContainer.addEventListener('click', (e) => this.handleContentClick(e));
        
        $('#formModal').on('hidden.bs.modal', () => {
            $('#recordForm').html('');
        });

        $('#saveRecord').on('click', () => this.saveRecord());
    }
    handleNavClick(e) {
        e.preventDefault();
        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
        e.target.classList.add('active');
        const section = e.target.dataset.section;
        this.loadContent(section);
    }

    handleContentClick(e) {
        if (e.target.classList.contains('edit-item')) {
            this.editItem(e.target.dataset.id, e.target.dataset.type);
        } else if (e.target.classList.contains('delete-item')) {
            this.deleteItem(e.target.dataset.id, e.target.dataset.type);
        } else if (e.target.id === 'add-event') {
            this.showAddForm('event');
        } else if (e.target.classList.contains('status-dropdown')) {
            this.updateEventStatus(e.target);
        } else if (e.target.classList.contains('save-prize-distribution')) {
            this.savePrizeDistribution(e.target);
        } else if (e.target.classList.contains('approve-department-head')) {
            this.approveDepartmentHead(e.target.dataset.userId);
        } else if (e.target.classList.contains('reject-department-head')) {
            this.rejectDepartmentHead(e.target.dataset.userId);
        }
    }

    async loadContent(section) {
        try {
            if (section === 'department-info') {
                const [departments, pendingHeads] = await Promise.all([
                    this.fetchData('get_department_info'),
                    this.fetchData('get_pending_department_heads')
                ]);
                const content = this.generateDepartmentContent(departments, pendingHeads);
                this.contentContainer.innerHTML = content;
            } else {
                const data = await this.fetchData(`get_${section.replace('-', '_')}`);
                const content = this.generateContent(section, data);
                this.contentContainer.innerHTML = content;
            }
        } catch (error) {
            console.error('Failed to load content:', error);
            this.contentContainer.innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
        }
    }

    async fetchData(action, params = {}) {
        const response = await fetch('SahyaDD_PHP.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ action, ...params })
        });
        const data = await response.json();
        console.log(data); // Add this line to inspect the data received
        if (data.error) throw new Error(data.error);
        return data;
    }

    generateDepartmentContent(departments, pendingHeads) {
        let content = '<h2>Department Information</h2>';
        
        // Pending Department Heads section
        content += '<h3>Pending Department Heads</h3>';
        if (pendingHeads.length > 0) {
            content += `
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${pendingHeads.map(head => `
                            <tr>
                                <td>${head.full_name}</td>
                                <td>${head.email}</td>
                                <td>${head.phone_number}</td>
                                <td>${head.department_name}</td>
                                <td>
                                    <button class="btn btn-sm btn-success approve-department-head" data-user-id="${head.user_id}">Approve</button>
                                    <button class="btn btn-sm btn-danger reject-department-head" data-user-id="${head.user_id}">Reject</button>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            `;
        } else {
            content += '<p>No pending department heads.</p>';
        }

        // Approved Department Heads section
        content += '<h3>Approved Department Heads</h3>';
        content += this.generateTable(departments);
        
        return content;
    }

    generateContent(section, data) {
        const generators = {
            'department-info': () => this.generateDepartmentTable(data),
            'events': () => this.generateEventsTable(data),
            'live-updates': () => this.generateLiveUpdatesTable(data),
            'registrations': () => this.generateTable(data),
            'payments': () => this.generateTable(data),
            'reports': () => this.generateReportsContent(data),
            'prize-distribution': () => this.generatePrizeDistributionTable(data)
        };

        const generator = generators[section] || (() => '<p>Section not found</p>');
        return `<h2>${section.replace('-', ' ').charAt(0).toUpperCase() + section.replace('-', ' ').slice(1)}</h2>${generator()}`;
    }

    generateTable(data) {
        if (data.length === 0) return '<p>No data available</p>';
        const headers = Object.keys(data[0]);
        return `
            <table class="table table-striped">
                <thead>
                    <tr>
                        ${headers.map(key => `<th>${this.formatHeader(key)}</th>`).join('')}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.map(item => `
                        <tr>
                            ${headers.map(key => `<td>${item[key]}</td>`).join('')}
                            <td>
                                <button class="btn btn-sm btn-primary edit-item" data-id="${item.id || item[headers[0]]}" data-type="${headers[0].replace('_id', '')}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-item" data-id="${item.id || item[headers[0]]}" data-type="${headers[0].replace('_id', '')}">Delete</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;
    }

    generateDepartmentTable(data) {
        return `
            <button class="btn btn-primary mb-3" onclick="sahyaDashboard.showAddForm('department')">Add New Department</button>
            ${this.generateTable(data)}
        `;
    }

    generateEventsTable(data) {
        return `
            <button class="btn btn-primary mb-3" onclick="sahyaDashboard.showAddForm('event')">Add New Event</button>
            ${this.generateTable(data)}
        `;
    }

    generateLiveUpdatesTable(data) {
        return `
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.map(item => `
                        <tr>
                            <td>${item.event_name}</td>
                            <td>${item.event_date}</td>
                            <td>${item.event_location}</td>
                            <td>
                                <select class="form-control status-dropdown" data-event-id="${item.event_id}">
                                    ${['Upcoming', 'Live', 'Ended'].map(status => 
                                        `<option value="${status}" ${item.status === status ? 'selected' : ''}>${status}</option>`
                                    ).join('')}
                                </select>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;
    }

    generateReportsContent(data) {
        return `
            <div class="row">
                ${['Total Departments', 'Total Events', 'Total Participants', 'Total Revenue'].map((title, index) => `
                    <div class="col-md-3">
                        <div class="card text-white bg-${['primary', 'success', 'info', 'warning'][index]} mb-3">
                            <div class="card-body">
                                <h5 class="card-title">${title}</h5>
                                <p class="card-text">${index === 3 ? '$' + parseFloat(data[title.toLowerCase().replace(' ', '_')]).toFixed(2) : data[title.toLowerCase().replace(' ', '_')]}</p>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;
    }

    generatePrizeDistributionTable(data) {
        return `
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Winner Name</th>
                        <th>Prize Amount</th>
                        <th>Distribution Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.map(item => `
                        <tr>
                            <td>${item.event_name}</td>
                            <td>${item.department_name}</td>
                            <td>${item.position}</td>
                            <td><input type="text" class="form-control" value="${item.winner_name || ''}" data-field="winner_name"></td>
                            <td><input type="number" class="form-control" value="${item.prize_amount || ''}" data-field="prize_amount"></td>
                            <td>
                                <select class="form-control" data-field="distribution_status">
                                    <option value="Pending" ${item.distribution_status === 'Pending' ? 'selected' : ''}>Pending</option>
                                    <option value="Distributed" ${item.distribution_status === 'Distributed' ? 'selected' : ''}>Distributed</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary save-prize-distribution" data-event-id="${item.event_id}" data-position="${item.position}">Save</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;
    }

    async savePrizeDistribution(button) {
        const row = button.closest('tr');
        const eventId = button.dataset.eventId;
        const position = button.dataset.position;
        const winnerName = row.querySelector('input[data-field="winner_name"]').value;
        const prizeAmount = row.querySelector('input[data-field="prize_amount"]').value;
        const distributionStatus = row.querySelector('select[data-field="distribution_status"]').value;
        
        try {
            await this.fetchData('update_prize_distribution', {
                event_id: eventId,
                position: position,
                winner_name: winnerName,
                prize_amount: prizeAmount,
                distribution_status: distributionStatus
            });
            alert('Prize distribution updated successfully');
        } catch (error) {
            console.error('Failed to update prize distribution:', error);
            alert('An error occurred while updating prize distribution');
        }
    }

    formatHeader(key) {
        return key.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
    }


        async showAddForm(type) {
            const formHtml = await this.getFormHtml(type);
            $('#recordForm').html(formHtml);
            $('#formModalLabel').text(`Add ${type.charAt(0).toUpperCase() + type.slice(1)}`);
            $('#formModal').modal('show');
        }
    
        async editItem(id, type) {
            try {
                const data = await this.fetchData(`get_${type}`, { [`${type}_id`]: id });
                const formHtml = await this.getFormHtml(type, data);
                $('#recordForm').html(formHtml);
                $('#formModalLabel').text(`Edit ${type.charAt(0).toUpperCase() + type.slice(1)}`);
                $('#formModal').modal('show');
            } catch (error) {
                console.error('Failed to load edit form:', error);
                alert('An error occurred while loading the edit form');
            }
        }

        async getFormHtml(type, data = null) {
            let formHtml = '';
            
            switch (type) {
                case 'department':
                    formHtml = `
                        <input type="hidden" name="action" value="${data ? 'edit_department' : 'add_department'}">
                        ${data ? `<input type="hidden" name="department_id" value="${data.department_id}">` : ''}
                        <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input type="text" class="form-control" id="department_name" name="department_name" value="${data ? data.department_name : ''}" required>
                        </div>
                    `;
                    break;
                case 'event':
                    const departments = await this.fetchData('get_departments');
                    formHtml = `
                        <input type="hidden" name="action" value="${data ? 'edit_event' : 'add_event'}">
                        ${data ? `<input type="hidden" name="event_id" value="${data.event_id}">` : ''}
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" value="${data ? data.event_name : ''}" required>
                        </div>
                        <div class="form-group">
                            <label for="event_date">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" value="${data ? data.event_date : ''}" required>
                        </div>
                        <div class="form-group">
                            <label for="event_location">Event Location</label>
                            <input type="text" class="form-control" id="event_location" name="event_location" value="${data ? data.event_location : ''}" required>
                        </div>
                        <div class="form-group">
                            <label for="event_description">Event Description</label>
                            <textarea class="form-control" id="event_description" name="event_description" required>${data ? data.event_description : ''}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_fee">Event Fee</label>
                            <input type="number" class="form-control" id="event_fee" name="event_fee" value="${data ? data.event_fee : ''}" required>
                        </div>
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select class="form-control" id="department_id" name="department_id" required>
                                ${departments.map(dept => `
                                    <option value="${dept.department_id}" ${data && data.department_id == dept.department_id ? 'selected' : ''}>
                                        ${dept.department_name}
                                    </option>
                                `).join('')}
                            </select>
                        </div>
                    `;
                    break;
                default:
                    formHtml = '<p>Form not found</p>';
            }
        
            return formHtml;
        }



    async saveRecord() {
        const formData = new FormData($('#recordForm')[0]);
        try {
            const result = await this.fetchData(formData.get('action'), Object.fromEntries(formData));
            alert(result.message);
            $('#formModal').modal('hide');
            this.loadContent($('.nav-link.active').data('section'));
        } catch (error) {
            console.error('Failed to save record:', error);
            alert('An error occurred while saving the record');
        }
    }

    async deleteItem(id, type) {
        if (confirm(`Are you sure you want to delete this ${type}?`)) {
            try {
                const result = await this.fetchData(`delete_${type}`, { [`${type}_id`]: id });
                alert(result.message);
                this.loadContent(`${type}-info`);
            } catch (error) {
                console.error(`Failed to delete ${type}:`, error);
                alert(`An error occurred while deleting the ${type}`);
            }
        }
    }

    async updateEventStatus(selectElement) {
        const eventId = selectElement.dataset.eventId;
        const newStatus = selectElement.value;
        try {
            await this.fetchData('update_event_status', { event_id: eventId, new_status: newStatus });
            alert('Event status updated successfully');
        } catch (error) {
            console.error('Failed to update event status:', error);
            alert('An error occurred while updating event status');
        }
    }

    async approveDepartmentHead(userId) {
        try {
            await this.fetchData('approve_department_head', { user_id: userId });
            alert('Department head approved successfully');
            this.loadContent('department-info');
        } catch (error) {
            console.error('Failed to approve department head:', error);
            alert('An error occurred while approving the department head');
        }
    }

    async rejectDepartmentHead(userId) {
        if (confirm('Are you sure you want to reject this department head? This action cannot be undone.')) {
            try {
                await this.fetchData('reject_department_head', { user_id: userId });
                alert('Department head rejected and removed successfully');
                this.loadContent('department-info');
            } catch (error) {
                console.error('Failed to reject department head:', error);
                alert('An error occurred while rejecting the department head');
            }
        }
    }

    /*async savePrizeDistribution(button) {
        const row = button.closest('tr');
        const eventId = button.dataset.eventId;
        const firstPosition = row.querySelector('input[data-field="first_position"]').value;
        const secondPosition = row.querySelector('input[data-field="second_position"]').value;
        const thirdPosition = row.querySelector('input[data-field="third_position"]').value;
        
        try {
            await this.fetchData('update_prize_distribution', {
                event_id: eventId,
                first_position: firstPosition,
                second_position: secondPosition,
                third_position: thirdPosition
            });
            alert('Prize distribution updated successfully');
        } catch (error) {
            console.error('Failed to update prize distribution:', error);
            alert('An error occurred while updating prize distribution');
        }
    }*/

}

// Initialize the dashboard when the DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.sahyaDashboard = new SahyaDashboard();
    sahyaDashboard.loadContent('department-info');
});