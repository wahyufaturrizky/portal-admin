const flashData = $('.flash-data').data('flashdata');
const errorData = $('.error-data').data('errordata');

// Error
if (errorData) {

    Swal.fire({
        type: 'error',
        title: 'Data failed to add!',
        html: errorData
      })
}


// Success
if (flashData) {

    Swal.fire({
        type: 'success',
        title: 'Data ' + flashData,
        text: 'Your data ' + flashData,
      })
}

// Tombol Confirm Delete
$('.delete-button').on('click', function (e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#858796',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          
            document.location.href = href;
        }
      })

});