<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">

                            <!-- Filter + Button Row -->
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 my-3">
                                <!-- Left: Filters -->
                                <div class="d-flex flex-wrap align-items-center gap-2 mx-3">
                                    <input type="date" wire:model.live="fromDate" class="form-control expense-date">
                                    <input type="date" wire:model.live="toDate" class="form-control expense-date">
                                    <div class="input-group expense-input">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="search" class="form-control" placeholder="Search..."
                                            wire:model.live="search">
                                    </div>
                                </div>

                                <!-- Right: Add & Print Buttons -->
                                <div class="d-flex align-items-center gap-2">
                                    @can('expenses.add')
                                        <button type="button" class="btn btn-primary" onclick="printExpenseTable()">
                                            <i class="fa-solid fa-print"></i> Print
                                        </button>
                                        <a href="/add-expense" class="btn btn-primary btn-md" wire:navigate>
                                            <i class="fa-solid fa-plus"></i> Add New
                                        </a>
                                    @endcan
                                </div>
                            </div>

                            <!-- Expense Table -->
                            <table class="table table-hover align-middle" id="expenseTable">
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Expense Name</th>
                                        <th scope="col">Expense Category</th>
                                        <th scope="col">Total Cost</th>
                                        <th scope="col">Expense Date</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Create Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="7">
                                            <div
                                                class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading data...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->category ? $data->category->name : '-' }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->date)->format('d M Y') }}</td>
                                            <td class="text-danger" style="width: 20%">{!! nl2br(e($data->note)) !!}</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('expenses.edit')
                                                    <a href="{{ route('expense.edit', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fa-solid fa-pencil"></i> Edit
                                                    </a>
                                                @endcan
                                                @can('expenses.delete')
                                                    <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        wire:click="confirmDelete({{ $data->id }})">
                                                        <i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="8" class="text-center text-muted">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @include('backend.template.pagination')
                </div>
            </div>
        </div>
    </section>

    @include('backend.template.delete-modal')
</div>

<!-- Print Script -->
<script>
    function printExpenseTable() {
        const table = document.getElementById('expenseTable');
        const cloneTable = table.cloneNode(true);

        cloneTable.querySelectorAll('tr[wire\\:loading]').forEach(tr => tr.remove());

        const headers = cloneTable.querySelectorAll('thead th');
        let actionColIndex = -1;
        headers.forEach((th, idx) => {
            if (th.textContent.trim().toLowerCase() === 'action') {
                actionColIndex = idx;
                th.style.display = 'none';
            }
        });

        if (actionColIndex !== -1) {
            cloneTable.querySelectorAll('tbody tr, tfoot tr').forEach(tr => {
                if (tr.cells[actionColIndex]) {
                    tr.cells[actionColIndex].style.display = 'none';
                }
            });
        }

        let totalCost = 0;
        const rows = cloneTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const amountCell = row.cells[3];
            if (amountCell) {
                const amount = parseFloat(amountCell.textContent.trim()) || 0;
                totalCost += amount;
            }
        });

        const footerRow = `
            <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right;">Total Cost</th>
                    <th>${totalCost.toFixed(2)}</th>
                    <th colspan="3"></th>
                </tr>
            </tfoot>
        `;
        cloneTable.insertAdjacentHTML('beforeend', footerRow);

        const printContent = cloneTable.outerHTML;

        const fromDate = document.querySelector('input[wire\\:model\\.live="fromDate"]').value;
        const toDate = document.querySelector('input[wire\\:model\\.live="toDate"]').value;
        const fromDateFormatted = fromDate ? new Date(fromDate).toLocaleDateString('en-GB') : 'N/A';
        const toDateFormatted = toDate ? new Date(toDate).toLocaleDateString('en-GB') : 'N/A';
        const dateRangeText = `Expense Report: (${fromDateFormatted} - ${toDateFormatted})`;

        const now = new Date();
        const printDate = now.toLocaleString('en-GB', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });

        const newWindow = window.open('', '', 'width=800,height=600');
        newWindow.document.write(`
            <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 15px; }
                        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
                        th { background-color: #f2f2f2; }
                        h3 { text-align: center; margin-bottom: 10px; }
                        tfoot th { background-color: #ddd; }
                        .meta-info { text-align: center; line-height: 1.2; font-size: 14px; margin-bottom: 10px; }
                    </style>
                </head>
                <body>
                    <h3>{!! str_replace(',,', '<br>', e($setting->address)) !!}</h3>
                    <hr>
                    <div class="meta-info">
                        <p>${dateRangeText}</p>
                        <p>Print Date: ${printDate}</p>
                    </div>
                    ${printContent}
                    <script>window.print(); window.close();<\/script>
                </body>
            </html>
        `);
        newWindow.document.close();
    }
</script>
