const Schedules = function () {
    let initPlugin = () => {
        DataTablesConfig('.datatables')
    }

    let populateTable = () => {
        let schedulesTable = $('#schedulesTable').DataTable()

        let url = '/api/schedules'

        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#ffffff'
            },
            message: 'Buscando agendamentos!'
        });

        request('GET', url,null)
            .then(response => {
                schedulesTable.clear();
                setTimeout($.unblockUI, 2000);
                if (response.status === 200 && response.data.length > 0) {
                    response.data.map(item => {
                        schedulesTable.row.add([
                            item.id, item.name, item.cpf, item.birthdate, item.created_at
                        ])
                    })

                    schedulesTable.draw()
                }
            })
            .catch(err => {
                if (err.response.status === 400) {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', err.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', 'Houve um erro ao listar os agendamentos', 'error')
                }
            })
    }

    return {
        init: function () {
            initPlugin()
            populateTable()
        }
    }
}()

$(document).ready(function () {
    Schedules.init()
})
