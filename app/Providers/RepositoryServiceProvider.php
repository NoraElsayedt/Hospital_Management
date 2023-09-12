<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Doctor\DoctorRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Interfaces\Service\ServiceRepositoryInterface;
use App\Repository\Service\ServiceRepository;
use App\Interfaces\Insurance\InsuranceRepositoryInterface;
use App\Repository\Insurance\InsuranceRepository;
use App\Interfaces\Ambulance\AmbulanceRepositoryInterface;
use App\Repository\Ambulance\AmbulanceRepository;
use App\Interfaces\Patient\PatientRepositoryInterface;
use App\Repository\Patient\PatientRepository;
use App\Interfaces\ReceiptAccount\ReceiptAccountRepositoryInterface;
use App\Repository\ReceiptAccount\ReceiptAccountRepository;
use App\Interfaces\ReceiptAccount\PaymentRepositoryInterface;
use App\Repository\ReceiptAccount\PaymentRepository;
use App\Interfaces\DashboardDoctor\IndexRepositoryInterface;
use App\Repository\DashboardDoctor\IndexRepository;
use App\Interfaces\DashboardDoctor\DiagnosticRepositoryInterface;
use App\Repository\DashboardDoctor\DiagnosticRepository;
use App\Interfaces\DashboardDoctor\RayRepositoryInterface;
use App\Repository\DashboardDoctor\RayRepository;
use App\Interfaces\DashboardDoctor\LaboratoryRepositoryInterface;
use App\Repository\DashboardDoctor\LaboratoryRepository;
use App\Interfaces\DashboardDoctor\Ray_EmployeeRepositoryInterface;
use App\Repository\DashboardDoctor\Ray_EmployeeRepository;
use App\Interfaces\Ray_EmployeeDashboard\IndexxRepositoryInterface;
use App\Repository\Ray_EmployeeDashboard\IndexxRepository;
use App\Interfaces\LaboratorieEmployee\LaboratorieEmployeeInterface;
use App\Repository\LaboratorieEmployee\LaboratorieEmployeeRepository;
use App\Interfaces\LaboratorieEmployee\IndexlabRepositoryInterface;
use App\Repository\LaboratorieEmployee\IndexlabRepository;


use App\Interfaces\dashboard_patient\Pat_invoRepositoryInterface;
use App\Repository\dashboard_patient\Pat_invoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptAccountRepositoryInterface::class, ReceiptAccountRepository::class); 
        $this->app->bind(PaymentRepositoryInterface::class,PaymentRepository::class);  
        $this->app->bind(IndexRepositoryInterface::class,IndexRepository::class); 
        $this->app->bind(DiagnosticRepositoryInterface::class,DiagnosticRepository::class);
        $this->app->bind(RayRepositoryInterface::class,RayRepository::class);
        $this->app->bind(LaboratoryRepositoryInterface::class,LaboratoryRepository::class);
        $this->app->bind(Ray_EmployeeRepositoryInterface::class,Ray_EmployeeRepository::class);
        $this->app->bind(IndexxRepositoryInterface::class,IndexxRepository::class); 
        $this->app->bind(LaboratorieEmployeeInterface::class,LaboratorieEmployeeRepository::class);
        $this->app->bind(IndexlabRepositoryInterface::class,IndexlabRepository::class);
        $this->app->bind(Pat_invoRepositoryInterface::class,Pat_invoRepository::class);
    }

    public function boot()
    {
    //    
    }
}
