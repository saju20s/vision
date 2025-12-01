<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header {
        margin-top: -20px !important;
    }

    .info-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10px;
        border: none;
    }

    .info-table td {
        padding: 2px 4px;
        border: none;
        vertical-align: top;
    }

    .bill-page {
        width: 100%;
        min-height: auto;
        margin: 0 auto;
        padding: 6mm;
        background-color: #fff;
        font-size: 11px;
        position: relative;
        page-break-after: always;
    }

    .bill-content {
        display: block;
        width: 100%;
        overflow: visible;
    }

    .bill-title {
        text-align: center;
        font-weight: bold;
        margin-bottom: 6px;
        margin-top: -10px;
        font-size: 14px;
        clear: both;
    }

    .patient-info-box {
        border: 1px solid #ccc;
        border-radius: 3px;
        /* padding: 6px; */
        margin-bottom: 8px;
    }

    .info-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 4px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 6px 0;
        font-size: 10px;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
        color: #000 !important;
    }

    th,
    td {
        padding: 3px;
        text-align: left;
    }

    th {
        background-color: #ccc;
        color: #000 !important;
        font-size: 10px;
    }

    .payment-status {
        text-align: center;
        margin: 6px 0;
        float: left;
        width: 30%;
    }

    .paid-stamp {
        border: 1px solid;
        font-weight: bold;
        padding: 3px 8px;
        font-size: 13px;
        display: inline-block;
    }

    .paid-stamp.paid {
        border-color: #008000;
        color: #008000;
    }

    .paid-stamp.due {
        border-color: #ff0000;
        color: #ff0000;
    }


    .payment-summary {
        width: 65%;
        margin-left: auto;
        font-size: 10.5px;
        word-wrap: break-word;
    }

    .payment-row {
        display: flex;
        justify-content: space-between;
        padding: 2px 0;
        border-bottom: 1px solid #ccc;
    }

    .footer {
        font-size: 10px;
        clear: both;
        padding: 8px;
    }

    .department-links {
        border: 1px solid #000;
        padding: 5px;
        text-align: center;
        font-size: 10.5px;
    }

    .note {
        font-size: 10px;
    }

    .footer-sticky {
        position: relative;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 6px 10px;
        font-size: 10px;
    }

    @media print {
        @page {
            size: A5 portrait;
            padding-top: 50px;
        }

        @page:first {
            padding-top: 0;
        }

        body * {
            visibility: hidden;
        }

        .bill-page,
        .bill-page * {
            visibility: visible;
        }

        .bill-page {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .footer-sticky {
            bottom: -23px;
        }

        .btn,
        .btn * {
            display: none !important;
        }
    }
</style>
