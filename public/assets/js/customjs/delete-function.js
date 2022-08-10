 function deleteFunction(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('formDeleteId' + id).submit(
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                )
            }
        })
    }