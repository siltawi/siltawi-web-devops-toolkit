function greetings(){
    // Getting elements and values
    let name = document.getElementById('name').value;
    let display = document.getElementById('displayPart');
    
    
    // alert(`Hi ${name}`);

    // Displaying
    display.innerHTML = `Hi ${name}`;
    
}