
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sahya Event Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            align-items: center;
            background-image: url('mountpic.jpg');
            display: flex;
            justify-content: center;
            height: 100vh;
            overflow: hidden; /* Prevent body scroll */
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            max-height: 80vh; /* Adjust as needed */
            overflow-y: auto;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.9);
        }

        h1 {
            color: green;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            color: green;
            text-align: left;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        select {
            width: calc(100% - 60px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .clear-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 5px;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .clear-btn:hover {
            background-color: red;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="form-container" style="overflow-y: auto; position: relative;">
        <h1>Sahya Event Registration</h1>
        <form action="registrationnumgene.php" method="post">
            <label for="event-type">Event Type:</label>
            <select id="event-type" name="event_type" required onchange="adjustParticipantsField()">
                <option value="individual">Individual</option>
                <option value="group">Group</option>
            </select>
            <button type="button" class="clear-btn" onclick="clearField('event-type')">Clear</button>

            <div id="participants-container" style="overflow-y: auto; max-height: 200px;>
                <label for="participants-name">Participant(s) Name:</label>
                <input type="text" id="participants-name" name="participants_names[]" required>
                <button type="button" class="clear-btn" onclick="clearField('participants-name')">Clear</button>
            </div>
            <center><button type="button" onclick="addParticipantField()">Add Participant</button></center>

            <label for="department">Department:</label>
            <select id="department" name="department" required onchange="updateEvents()" required>
			<option value="placehldr">Select Department</option>
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="MCOM">MCOM</option>
                <option value="MCA">MCA</option>
            </select>
            <button type="button" class="clear-btn" onclick="clearField('department')">Clear</button>
            
            <label for="event">Event:</label>
            <select id="event" name="event" required>
                <!-- Options will be dynamically populated based on the department -->
            </select>
            <button type="button" class="clear-btn" onclick="clearField('event')">Clear</button>
            
            <label for="event-date">Event Date:</label>
            <input type="date" id="event-date" name="event_date" required>
            <button type="button" class="clear-btn" onclick="clearField('event-date')">Clear</button>
            
            <label for="contact-number">Contact Number:</label>
            <input type="text" id="contact-number" name="contact_number" onkeyup='phnerror()'required>
            <button type="button" class="clear-btn" onclick="clearField('contact-number')">Clear</button>
			<p id='cont_error' style='color:red;font=size:12px'></p>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="button" class="clear-btn" onclick="clearField('email')">Clear</button>
            
            <label for="college-name">College Name:</label>
            <input type="text" id="college-name" name="college_name" required>
            <button type="button" class="clear-btn" onclick="clearField('college-name')">Clear</button>
            
            <label for="place">Place:</label>
            <input type="text" id="place" name="place" required>
            <button type="button" class="clear-btn" onclick="clearField('place')">Clear</button>
        
            <button type="submit" class="submit-btn">Submit</button>
        </form>
		
    </div>
    
    
    <script>
	/*function adjustParticipantsField() {
    const eventType = document.getElementById('event-type').value;
    const participantsNameLabel = document.querySelector('label[for="participants-name"]');
    const participantsNameInput = document.getElementById('participants-name');

    if (eventType === 'individual') {
        participantsNameLabel.textContent = "Participant's Name:";
    } else {
        participantsNameLabel.textContent = "Participants' Names:";
    }
}*/
function phnerror(){
	var num=document.getElementById('contact-number').value;
	if(num.length<10){
		document.getElementById('cont_error').innerHTML='Contact  Number must be Ten Digits';
	}
	else if(num.length==10){
		document.getElementById('cont_error').innerHTML='';
	}
	else if(num.length>10){
		document.getElementById('cont_error').innerHTML='Invalid Contact Number';
	}
}
function updateEvents() {
    const department = document.getElementById('department').value;
    const eventSelect = document.getElementById('event');
    let options = [];

    if (department === 'BCA') {
        options = ['Event 1', 'Event 2', 'Event 3'];
    } else if (department === 'BBA') {
        options = ['Event X', 'Event Y', 'Event Z'];
    } else if (department === 'MCOM') {
        options = ['Event X', 'Event Y', 'Event Z'];
    } else if (department === 'MCA') {
        options = ['Event 4', 'Event 5'];
    }

    eventSelect.innerHTML = '';
    options.forEach(option => {
        const opt = document.createElement('option');
        opt.value = option;
        opt.textContent = option;
        eventSelect.appendChild(opt);
    });
}

function clearField(fieldId) {
    document.getElementById(fieldId).value = '';
}

        function adjustParticipantsField() {
            const eventType = document.getElementById('event-type').value;
            const participantsContainer = document.getElementById('participants-container');
            participantsContainer.innerHTML = '';

            if (eventType === 'individual') {
                const label = document.createElement('label');
                label.setAttribute('for', 'participants-name');
                label.textContent = "Participant's Name:";
                participantsContainer.appendChild(label);

                const input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('id', 'participants-name');
                input.setAttribute('name', 'participants_names[]');
                input.required = true;
                participantsContainer.appendChild(input);
                const clearBtn = document.createElement('button');
                clearBtn.setAttribute('type', 'button');
                clearBtn.setAttribute('class', 'clear-btn');
                clearBtn.textContent = 'Clear';
                clearBtn.onclick = () => clearField('participants-name');
                participantsContainer.appendChild(clearBtn);
            } else {
                const label = document.createElement('label');
                label.setAttribute('for', 'participants-name');
                label.textContent = "Participants' Names:";
                participantsContainer.appendChild(label);

                for (let i = 0; i < 8; i++) {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('id', `participants-name-${i}`);
                    input.setAttribute('name', 'participants_names[]');
                    input.required = i === 0; // Only the first field is required
                    participantsContainer.appendChild(input);
                    const clearBtn = document.createElement('button');
                    clearBtn.setAttribute('type', 'button');
                    clearBtn.setAttribute('class', 'clear-btn');
                    clearBtn.textContent = 'Clear';
                    clearBtn.onclick = () => clearField(`participants-name-${i}`);
                    participantsContainer.appendChild(clearBtn);
                }
            }
        }

        function clearField(fieldId) {
            document.getElementById(fieldId).value = '';
        }

        function addParticipantField() {
            const participantsContainer = document.getElementById('participants-container');
            const inputCount = participantsContainer.querySelectorAll('input').length;

            if (inputCount < 8) {
                const input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('id', `participants-name-${inputCount}`);
                input.setAttribute('name', 'participants_names[]');
                participantsContainer.appendChild(input);
                const clearBtn = document.createElement('button');
                clearBtn.setAttribute('type', 'button');
                clearBtn.setAttribute('class', 'clear-btn');
                clearBtn.textContent = 'Clear';
                clearBtn.onclick = () => clearField(`participants-name-${inputCount}`);
                participantsContainer.appendChild(clearBtn);
            } else {
                alert('Maximum 8 participants allowed.');
            }
        }

        function updateEvents() {
            const department = document.getElementById('department').value;
            const eventSelect = document.getElementById('event');
            eventSelect.innerHTML = '';

            let options = [];

            switch (department) {
                case 'BCA':
                    options = [
                        'Webscape-Webdesiging',
                        'Singularity-CTF Hackaton',
                        'AOXO Game spot',
                        'Dhwani Band war'
                    ];
                    break;
                case 'BBA':
                    options = [
                        'Event1',
                        'Event2',
                        'Event3'
                    ];
                    break;
                case 'MCOM':
                    options = [
                        'Event1',
                        'Event2',
                        'Event3'
                    ];
                    break;
                case 'MCA':
                    options = [
                        'Event1',
                        'Event2'
                    ];
                    break;
            }

            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option;
                opt.textContent = option;
                eventSelect.appendChild(opt);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            adjustParticipantsField();
        });

	</script>
</body>
</html>
   
