class AjaxTable {
    constructor(config) {
        this.url = config.url;
        this.tbody = config.tbody;
        this.pagination = config.pagination;
        this.columns = config.columns;

        this.page = 1;
        this.perPage = 10;
        this.search = '';
        this.category = '';
    }

    fetch() {
        $.get(this.url, {
            page: this.page,
            per_page: this.perPage,
            search: this.search,
            category: this.category,
        }, (res) => {
            this.renderTable(res.data);
            this.renderPagination(res.meta, res.data.length);
        });
    }

    renderTable(data) {
        let html = '';

        data.forEach(row => {
            html += '<tr>';
            this.columns.forEach(col => {
                html += `<td class="px-5 py-4">${row[col]}</td>`;
            });
            html += '</tr>';
        });

        $(this.tbody).html(html);
    }

    renderPagination(meta, currentCount) {
        // if (meta.last_page <= 1) {
        //     $(this.pagination).html('');
        //     return;
        // }

        let html = `
        <div class="flex flex-wrap items-center justify-between gap-3 pt-4">
            <p class="text-sm text-gray-500">
                Showing ${currentCount} of ${meta.total} results
            </p>
            <div class="flex items-center gap-2">
        `;

        // Previous
        html += `
            <button
                type="button"
                data-page="${meta.current_page - 1}"
                ${meta.current_page === 1 ? 'disabled' : ''}
                class="flex h-9 w-9 items-center justify-center rounded-xl border
                    ${meta.current_page === 1
                        ? 'border-gray-100 text-gray-300 cursor-not-allowed'
                        : 'border-gray-200 text-gray-500 hover:bg-gray-50'}">
                &larr;
            </button>
        `;

        // Page numbers
        for (let i = 1; i <= meta.last_page; i++) {
            html += `
                <button
                    type="button"
                    data-page="${i}"
                    class="flex h-9 min-w-[36px] items-center justify-center rounded-xl
                        border border-gray-200 text-sm font-semibold
                        ${i === meta.current_page
                            ? 'bg-[#EE4D37] text-white'
                            : 'bg-white text-gray-600 hover:bg-gray-50'}">
                    ${i}
                </button>
            `;
        }

        // Next
        html += `
            <button
                type="button"
                data-page="${meta.current_page + 1}"
                ${meta.current_page === meta.last_page ? 'disabled' : ''}
                class="flex h-9 w-9 items-center justify-center rounded-xl border
                    ${meta.current_page === meta.last_page
                        ? 'border-gray-100 text-gray-300 cursor-not-allowed'
                        : 'border-gray-200 text-gray-500 hover:bg-gray-50'}">
                &rarr;
            </button>
        `;

        html += `
            </div>
        </div>
        `;

        $(this.pagination).html(html);

        $(this.pagination).find('button[data-page]').not('[disabled]').click(e => {
            this.page = $(e.currentTarget).data('page');
            this.fetch();
        });
    }

    setSearch(value) {
        this.search = value;
        this.page = 1;
        this.fetch();
    }
    
    setCat(value) {
        this.category = value;
        this.page = 1;
        this.fetch();
    }

    setPerPage(value) {
        this.perPage = value;
        this.page = 1;
        this.fetch();
    }
}