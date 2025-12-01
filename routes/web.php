<?php

use App\Livewire\Backend\Dashboard;
use App\Livewire\Frontend\BlogPage;
use App\Livewire\Frontend\BlogView;
use App\Livewire\Frontend\HomePage;
use App\Livewire\Frontend\PageView;
use App\Livewire\Installer\Welcome;
use App\Livewire\Frontend\VideoPage;
use App\Livewire\Backend\Blogs\Blogs;
use App\Livewire\Backend\Indoor\Beds;
use App\Livewire\Backend\Links\Links;
use App\Livewire\Backend\Pages\Pages;
use App\Livewire\Backend\Roles\Roles;
use App\Livewire\Backend\Teams\Teams;
use App\Livewire\Backend\Users\Users;
use App\Livewire\Frontend\DoctorView;
use App\Livewire\Frontend\NoticePage;
use App\Livewire\Frontend\ViewNotice;
use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\ContactPage;
use App\Livewire\Frontend\GalleryPage;
use App\Livewire\Frontend\PaymentPage;
use App\Livewire\Backend\Bills\AddBill;
use App\Livewire\Backend\Blogs\AddBlog;
use App\Livewire\Backend\Links\AddLink;
use App\Livewire\Backend\Onlinereports;
use App\Livewire\Backend\Pages\AddPage;
use App\Livewire\Backend\Roles\AddRole;
use App\Livewire\Backend\Teams\AddTeam;
use App\Livewire\Backend\Users\AddUser;
use App\Livewire\Backend\Videos\Videos;
use App\Livewire\Installer\Environment;
use App\Livewire\Installer\Requirement;
use Illuminate\Support\Facades\Artisan;
use App\Livewire\Backend\Bills\EditBill;
use App\Livewire\Backend\Blogs\EditBlog;
use App\Livewire\Backend\Pages\EditPage;
use App\Livewire\Backend\Roles\EditRole;
use App\Livewire\Backend\Teams\EditTeam;
use App\Livewire\Backend\Users\EditUser;
use App\Livewire\Frontend\AllDoctorPage;
use App\Livewire\Backend\Bills\AddReport;
use App\Livewire\Backend\Courses\Courses;
use App\Livewire\Backend\Doctors\Doctors;
use App\Livewire\Backend\Notices\Notices;
use App\Livewire\Backend\Sliders\Sliders;
use App\Livewire\Backend\Videos\AddVideo;
use App\Livewire\Frontend\Auth\LoginPage;
use App\Livewire\Frontend\DepartmentView;
use App\Livewire\Backend\Hospital\Consent;
use App\Livewire\Frontend\TestimonialView;
use App\Livewire\Installer\InstallerFinal;
use App\Livewire\Backend\Bills\InvoiceList;
use App\Livewire\Backend\Bills\InvoiceView;
use App\Livewire\Backend\Bills\SurgeryBill;
use App\Livewire\Backend\Courses\AddCourse;
use App\Livewire\Backend\Doctors\AddDoctor;
use App\Livewire\Backend\Messages\Messages;
use App\Livewire\Backend\Notices\AddNotice;
use App\Livewire\Backend\Patients\Patients;
use App\Livewire\Backend\Sliders\AddSlider;
use App\Livewire\Backend\Courses\EditCourse;
use App\Livewire\Backend\Doctors\EditDoctor;
use App\Livewire\Backend\Notices\ApaNotices;
use App\Livewire\Backend\Notices\EditNotice;
use App\Livewire\Backend\Notices\NocNotices;
use App\Livewire\Backend\Reports\EditReport;
use App\Livewire\Backend\Sliders\EditSlider;
use App\Livewire\Frontend\Auth\RegisterPage;
use App\Http\Middleware\CheckRejectedPayment;
use App\Livewire\Backend\Activity\Activities;
use App\Livewire\Backend\Bills\Billhistories;
use App\Livewire\Backend\Bills\TestHistories;
use App\Livewire\Backend\Employees\Employees;
use App\Livewire\Backend\Expenses\AddExpense;
use App\Livewire\Backend\Galleries\Galleries;
use App\Livewire\Backend\Patients\AddPatient;
use App\Livewire\Backend\Reports\ViewReports;
use App\Livewire\Backend\Statement\Statement;
use App\Livewire\Backend\Delivery\AllPatients;
use App\Livewire\Backend\Delivery\PrintReport;
use App\Livewire\Backend\Expenses\AllExpenses;
use App\Livewire\Backend\Expenses\EditExpense;
use App\Livewire\Backend\Galleries\AddGallery;
use App\Livewire\Backend\Hospital\PtOtConsent;
use App\Livewire\Backend\Hospital\ViewConsent;
use App\Livewire\Backend\Patients\EditPatient;
use App\Livewire\Backend\Blogs\AllBlogCategory;
use App\Livewire\Backend\Commenders\Commenders;
use App\Livewire\Backend\Doctors\DoctorHistory;
use App\Livewire\Backend\Employees\AddEmployee;
use App\Livewire\Backend\Marketings\Marketings;
use App\Livewire\Backend\Messages\ReplyMessage;
use App\Livewire\Installer\InstallerPermission;
use App\Livewire\Backend\Hospital\HospitalLevel;
use App\Livewire\Backend\Settings\Footer\Footer;
use App\Livewire\Backend\Settings\Header\Header;
use App\Livewire\Backend\Commenders\AddCommender;
use App\Livewire\Backend\Delivery\PatientReports;
use App\Livewire\Backend\Doctors\DoctorCommision;
use App\Livewire\Backend\Marketings\AddMarketing;
use App\Livewire\Backend\Permissions\Permissions;
use App\Livewire\Backend\Statement\EditStatement;
use App\Livewire\Frontend\Auth\ResetPasswordPage;
use App\Http\Controllers\ReportDownloadController;
use App\Livewire\Backend\Bills\BillhistoryInvoice;
use App\Livewire\Backend\Commenders\EditCommender;
use App\Livewire\Backend\Investigations\TestForms;
use App\Livewire\Backend\Marketings\EditMarketing;
use App\Livewire\Backend\Settings\Contact\Contact;
use App\Livewire\Backend\Settings\Smtp\SmtpUpdate;
use App\Livewire\Frontend\Auth\ForgotPasswordPage;
use App\Livewire\Backend\Departments\AddDepartment;
use App\Livewire\Backend\Employees\EmployeeHistory;
use App\Livewire\Backend\Hospital\AllAdmissionList;
use App\Livewire\Backend\Settings\Sidebar\Sidebars;
use App\Livewire\Backend\Departments\AllDepartments;
use App\Livewire\Backend\Departments\EditDepartment;
use App\Livewire\Backend\Expenses\AllExpenseHistory;
use App\Livewire\Backend\Settings\Logo\LogoIdentity;
use App\Livewire\Backend\Doctors\DoctorCommisionList;
use App\Livewire\Backend\Expenses\AllExpenseCategory;
use App\Livewire\Backend\Investigations\EditTestForm;
use App\Livewire\Backend\Marketings\MarketingHistory;
use App\Livewire\Backend\Investigations\Investigations;
use App\Livewire\Backend\Marketings\MarketingCommision;
use App\Livewire\Backend\Settings\Academic\AcademicInfo;
use App\Livewire\Backend\Settings\Profile\ProfileUpdate;
use App\Livewire\Backend\Investigations\AddInvestigation;
use App\Livewire\Backend\Settings\Report\ReportSignature;
use App\Livewire\Backend\Investigations\EditInvestigation;
use App\Livewire\Backend\Marketings\MarketingCommisionList;
use App\Livewire\Backend\Payments\AddPayment;
use App\Livewire\Backend\Payments\AllPaymentList;
use App\Livewire\Backend\Payments\AllPayments;
use App\Livewire\Backend\Payments\EditPayment;
use App\Livewire\Backend\Payments\PaymentInvoice;

// ===========================Frontend Pages=============================//
Route::get('/', HomePage::class);
Route::get('/all-doctors-list', AllDoctorPage::class);
Route::get('/doctor-view/{id}', DoctorView::class);
Route::get('/department-view/{id}', DepartmentView::class);
Route::get('/page-view/{slug}', PageView::class);
Route::get('/blogs', BlogPage::class);
Route::get('/blog-view/{id}', BlogView::class);
Route::get('/Testimonial-view/{id}', TestimonialView::class);

Route::get('/notice', NoticePage::class);
Route::get('/view-notice/{id}', ViewNotice::class);

Route::get('/gallery', GalleryPage::class);
Route::get('/video', VideoPage::class);
Route::get('/contact-us', ContactPage::class);

Route::get('/payment', PaymentPage::class)
    ->middleware([CheckRejectedPayment::class])
    ->name('payment.page');

// ===========================Frontend Authintication=========================//
Route::get('/account-login', LoginPage::class)->name('account.login');
Route::get('/account-register', RegisterPage::class)->name('account.register');
Route::get('/account-forgot-password', ForgotPasswordPage::class)->name('account.forgot.password');
Route::get('/account-reset-password/{token?}/{email?}', ResetPasswordPage::class)->name('account.forgot.password');

// ===========================Installer========================================//
Route::get('/installer/welcome', Welcome::class)->name('installer.welcome')->middleware('check.installed');
Route::get('/installer/requirements', Requirement::class)->name('installer.requirements')->middleware('check.installed');
Route::prefix('installer')
    ->middleware(['check.installed', 'installer.requirements'])
    ->group(function () {
        Route::get('/permissions', InstallerPermission::class);
        Route::get('/environment', Environment::class)->name('installer.environment');
        Route::get('/final', InstallerFinal::class)->name('installer.final');
    });

// ============================Online Reports===================================//
Route::get('/online-reports/{billid}/{patientid}', Onlinereports::class);

Route::get('/download-reports/{billid}/{patientid}', [ReportDownloadController::class, 'downloadAllReports'])
    ->name('reports.download');

Route::get('/qr-report/{reportId}', [ReportDownloadController::class, 'downloadSingleReport'])
    ->name('qr.report.download');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->middleware('verified')
        ->name('dashboard');

    // ==============================================Indoor=======================================================//
    Route::get('/all-beds', Beds::class);
    Route::get('/all-hospital-level', HospitalLevel::class);
    Route::get('/all-admission-list', AllAdmissionList::class);
    Route::get('/patient-ot-consent/{id}', PtOtConsent::class)->name('pt.ot.consent');
    Route::get('/all-consent', Consent::class);
    Route::get('/view-consent/{id}', ViewConsent::class);



    // ==========================Patients=============================================//
    Route::get('/all-patients', Patients::class)->middleware('can:patients.view');
    Route::get('/add-patient', AddPatient::class)->middleware('can:patients.add');
    Route::get('/edit-patient/{id}', EditPatient::class)->name('patient.edit')->middleware('can:patients.edit');

    // ==========================Employee==============================================//
    Route::get('/all-employees', Employees::class);
    Route::get('/employee-history/{id}', EmployeeHistory::class)->name('employee.history');
    Route::get('/add-employee', AddEmployee::class);

    // ===========================Doctors===============================================//
    Route::get('/all-doctors', Doctors::class)->middleware('can:doctors.view');
    Route::get('/add-doctor', AddDoctor::class)->middleware('can:doctors.add');
    Route::get('/doctor-commision-list', DoctorCommisionList::class)->middleware('can:doctors.add');
    Route::get('/edit-doctor/{id}', EditDoctor::class)->name('doctor.edit')->middleware('can:doctors.edit');
    Route::get('/doctor-commision', DoctorCommision::class)->middleware('can:commisions.view');
    Route::get('/doctor-history/{id}', DoctorHistory::class)->name('doctor.history')->middleware('can:commisions.edit');

    // ===========================Marketings==============================================//
    Route::get('/all-marketings', Marketings::class)->middleware('can:marketings.view');
    Route::get('/add-marketing', AddMarketing::class)->middleware('can:marketings.add');
    Route::get('/marketing-commision-list', MarketingCommisionList::class)->middleware('can:marketings.add');
    Route::get('/edit-marketing/{id}', EditMarketing::class)->name('marketing.edit')->middleware('can:marketings.edit');
    Route::get('/marketing-commision', MarketingCommision::class)->middleware('can:commisions.view');
    Route::get('/marketing-history/{id}', MarketingHistory::class)->name('marketing.history')->middleware('can:commisions.edit');



    // ==========================Investigations===============================================//
    Route::get('/all-investigations', Investigations::class)->middleware('can:investigations.view');
    Route::get('/add-investigation', AddInvestigation::class)->middleware('can:investigations.add');
    Route::get('/edit-investigation/{id}', EditInvestigation::class)->name('investigation.edit')->middleware('can:investigations.edit');
    Route::get('/test-forms', TestForms::class)->middleware('can:investigation_form.view');
    Route::get('/edit-testform/{id}', EditTestForm::class)->name('testform.edit')->middleware('can:investigation_form.edit');

    // ============================Bills=======================================================//
    Route::get('/add-bill', AddBill::class)->middleware('can:bill.add');
    Route::get('/surgery-bill', SurgeryBill::class)->middleware('can:bill.add');
    Route::get('/bills', InvoiceList::class)->name('bills.list')->middleware('can:invoice.view');
    Route::get('/bill/view/{billId}', InvoiceView::class)->name('bill.view')->middleware('can:bill_history.invoice');
    Route::get('/invoice/pdf/{billId}', [InvoiceView::class, 'openPdf']);
    Route::get('/bill/edit/{bill_id}', EditBill::class)->name('bill.edit');

    // ===========================Bill History=====================================================//
    Route::get('/history-bills', Billhistories::class)->middleware('can:invoice.view');
    Route::get('/test-history', TestHistories::class)->middleware('can:invoice.view');
    Route::get('/bill/invoice/{invoice_number}', BillhistoryInvoice::class)->name('bill.invoice')->middleware('can:invoice.invoice');

    // =============================Expenses==========================================================//
    Route::get('/all-expenses', AllExpenses::class)->middleware('can:expenses.view');
    Route::get('/add-expense', AddExpense::class)->middleware('can:expenses.add');
    Route::get('/edit-expense/{id}', EditExpense::class)->name('expense.edit')->middleware('can:expenses.edit');
    Route::get('/history-expenses', AllExpenseHistory::class)->middleware('can:expenses.view');

    // =============================Expenses Category==================================================//
    Route::get('/all-expenses-category', AllExpenseCategory::class)->middleware('can:expense_category.view');



    // ===================================Reports=========================================================//
    Route::get('/all-reports', ViewReports::class)->middleware('can:reports.view');
    Route::get('/add-report/{id}', AddReport::class)->name('add.report')->middleware('can:reports.test');
    Route::get('/edit-report/{id}/{bill_id?}', EditReport::class)->name('edit.report');
    Route::get('/report-signature', ReportSignature::class);

    // ===================================Report Delivery===================================================//
    Route::get('/all-patients-reports', AllPatients::class);
    Route::get('/patient/{patientId}/reports', PatientReports::class)->name('patient.reports')->middleware('can:reports_delivery.view');
    Route::get('/laboratory/print/{report}', PrintReport::class)->name('laboratory.print')->middleware('can:reports_delivery.view');



    // ==============================================Pages=============================================================//
    Route::get('/all-pages', Pages::class)->middleware('can:pages.view');
    Route::get('/add-page', AddPage::class)->middleware('can:pages.add');
    Route::get('/edit-page/{id}', EditPage::class)->name('admin.pages.edit')->middleware('can:pages.edit');
    // ==============================================Sliders=============================================================//
    Route::get('/all-sliders', Sliders::class)->middleware('can:sliders.view');
    Route::get('/add-slider', AddSlider::class)->middleware('can:sliders.add');
    Route::get('/edit-slider/{id}', EditSlider::class)->name('slider.edit')->middleware('can:sliders.edit');
    // ==============================================Galleries=============================================================//
    Route::get('/all-galleries', Galleries::class)->middleware('can:gallery.view');
    Route::get('/add-gallery', AddGallery::class)->middleware('can:gallery.add');
    // ==============================================Blogs=======================================================//
    Route::get('/all-blogs', Blogs::class)->middleware('can:blogs.view');
    Route::get('/add-blog', AddBlog::class)->middleware('can:blogs.add');
    Route::get('/edit-blog/{id}', EditBlog::class)->name('blog.edit')->middleware('can:blogs.edit');
    // ==============================================Blogs Category=======================================================//
    Route::get('/all-blogs-category', AllBlogCategory::class);

    // ==============================================Departments=======================================================//
    Route::get('/all-departments', AllDepartments::class);
    Route::get('/add-department', AddDepartment::class);
    Route::get('/edit-department/{id}', EditDepartment::class)->name('department.edit');


    // ==============================================Commanders=======================================================//
    Route::get('/all-commenders', Commenders::class)->middleware('can:commanders.view');
    Route::get('/add-commender', AddCommender::class)->middleware('can:commanders.add');
    Route::get('/edit-commender/{id}', EditCommender::class)->name('commender.edit')->middleware('can:commanders.edit');
    // ==============================================Links=======================================================//
    Route::get('/all-links', Links::class)->middleware('can:links.view');
    Route::get('/add-link', AddLink::class)->middleware('can:links.add');
    // ===============================================Commanders===================================================//
    Route::get('/all-teams', Teams::class)->middleware('can:teams.view');
    Route::get('/add-team', AddTeam::class)->middleware('can:teams.add');
    Route::get('/edit-team/{id}', EditTeam::class)->name('team.edit')->middleware('can:teams.edit');
    // ===============================================Courses===================================================//
    Route::get('/all-courses', Courses::class)->middleware('can:courses.view');
    Route::get('/add-course', AddCourse::class)->middleware('can:courses.add');
    Route::get('/edit-course/{id}', EditCourse::class)->name('course.edit')->middleware('can:courses.edit');
    // ===============================================Notices===================================================//
    Route::get('/all-notices', Notices::class)->middleware('can:notices.view');
    Route::get('/add-notice', AddNotice::class)->middleware('can:notices.add');
    Route::get('/edit-notice/{id}', EditNotice::class)->name('notice.edit')->middleware('can:notices.edit');
    // ===============================================Noc Notices===================================================//
    Route::get('/noc-notices', NocNotices::class)->middleware('can:noc.view');
    // ================================================APA Notices==================================================//
    Route::get('/apa-notices', ApaNotices::class)->middleware('can:apa.view');
    // ===============================================Videos==========================================================//
    Route::get('/all-videos', Videos::class)->middleware('can:videos.view');
    Route::get('/add-video', AddVideo::class)->middleware('can:videos.add');
    // ===============================================Statement=======================================================//
    Route::get('/all-statement', Statement::class)->middleware('can:statement.view');
    Route::get('/edit-statement/{id}', EditStatement::class)->name('statement.edit')->middleware('can:statement.edit');
    // ==============================================Messages=========================================================//
    Route::get('/all-messages', Messages::class)->middleware('can:messages.view');
    Route::get('/reply-message/{id}', ReplyMessage::class)->name('reply.edit')->middleware('can:messages.view');
    // =============================================Users===========================================================//
    Route::get('/all-users', Users::class)->middleware('can:users.view');
    Route::get('/add-user', AddUser::class)->middleware('can:users.add');
    Route::get('/edit-user/{id}', EditUser::class)->name('user.edit')->middleware('can:users.edit');
    // ==========================================Role Management===================================================//
    Route::get('/all-roles', Roles::class)->name('all-roles')->middleware('can:roles.view');
    Route::get('/add-role', AddRole::class)->middleware('can:roles.add');
    Route::get('/edit-role/{id}', EditRole::class)->name('role.edit')->middleware('can:roles.edit');
    Route::get('/all-permissions', Permissions::class)->middleware('can:permissions.view');

    Route::get('/all-payments-list', AllPaymentList::class);

    // =============================================Users===========================================================//
    Route::middleware(['auth', 'paymentAccess'])->group(function () {
        Route::get('/all-payments', AllPayments::class);
        Route::get('/add-payment', AddPayment::class);
        Route::get('/edit-payment/{id}', EditPayment::class)->name('admin.payment.edit');
    });
    Route::get('/payment-invoice/{id}', PaymentInvoice::class)->name('admin.payment.invoice');

    // ===========================================Setting=======================================================//
    Route::get('/setting-logo-identity', LogoIdentity::class)->middleware('can:settings/logo_&_identity.view');
    Route::get('/setting-header', Header::class)->middleware('can:settings/header_setting.view');
    Route::get('/setting-footer', Footer::class)->middleware('can:settings/footer_setting.view');
    Route::get('/setting-sidebar', Sidebars::class)->middleware('can:settings/sidebar.view');
    Route::get('/setting-academic', AcademicInfo::class)->middleware('can:settings/academic_information.view');
    Route::get('/setting-profile', ProfileUpdate::class);
    Route::get('/setting-contact', Contact::class)->middleware('can:settings/contact_setting.view');
    Route::get('/setting-smtp', SmtpUpdate::class)->middleware('can:settings/smtp.view');

    Route::get('/all-activities', Activities::class)->middleware('can:activity.view');
    Route::view('profile', 'profile')->name('profile');
});


Route::get('/storage-link', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link created successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
