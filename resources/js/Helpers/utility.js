import Swal from 'sweetalert2';

export const alertUser = function(type, msg){
    switch(type){
        case 'error':
            Swal.fire({
                title: 'Declined',
                text: msg,
                icon: 'warning',
            });            
            break;
        case 'success': 
            Swal.fire({
                title: 'Successful',
                text: msg,
                icon: 'success',
            });
    }
} 