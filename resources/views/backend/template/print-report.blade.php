<style>
    .report-page {
        min-height: 95vh;
        display: flex;
        flex-direction: column;
        padding: 0 15px;
        background: #FFF;
    }

    .header {
        height: 80px;
        margin-bottom: 100px;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        padding: 3px 6px;
        color: #000!important;
    }

    .report-title {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        padding: 5px 0;
        background: #FFF;
        text-decoration: underline;
        text-transform: uppercase;
    }

    .results-section {
        padding: 20px;
        flex: 1;
        margin-top: -15px;
    }

    .results-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 12px;
    }

    .results-table th {
        background: #f1f1f1 !important;
        font-weight: bold;
        text-transform: uppercase;
        border: 1px solid #ccc;
    }

    .results-table td {
        padding: 3px 8px;
        /* text-align: center; */
    }

    .sub-test {
        padding-left: 15px;
    }

    .signature-section {
        display: flex;
        justify-content: space-between;
        padding: 0 35px;
        margin-bottom: 30px;
    }

    .signature-text {
        font-size: 10pt;
        font-weight: bold;
        text-align: left;
    }

    .signature-details {
        font-size: 9pt;
        margin-top: 3px;
        text-align: left;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .results-table thead th {
            background: #f1f1f1 !important;
            color: #000 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        #sharifITFirm,
        #sharifITFirm * {
            visibility: visible;
        }

        #sharifITFirm {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }
    }
</style>
