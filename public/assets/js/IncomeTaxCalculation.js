// salary Income
let CurrentEmployerSalary;
let EstimatedSal;
let SupllimentaryBill;
let EstimatedSupBill;
let GrossIncome;


// onChange
function GetFinanCialYear() {

    $('#employeelistId').selectize();
    // Employee List
    $.ajax({

        url: "/GetEmployeeListForIncomeTax/" + $("#financialyearId").val(),
        type: 'GET',
        datatype: "json",
        traditional: true,
        success: function (data) {
            $('#employeelistId').selectize();
            $('#employeelistId').selectize()[0].selectize.destroy();
            $('#employeelistId').empty();
            $('#employeelistId').prop('disabled', false);
            $.each(JSON.parse(data), function (i, item) {

                $('#employeelistId').append('<option value="' + item.Employeeid + '">' + item.EmployeeName + '</option>');

            });

            $select = $('#employeelistId').selectize({placeholder: '--SELECT--'});
            control = $select[0].selectize;
            control.clear();
        }
    });

}

//fill EmployeeData
$(".getdata").change(function () {

    var employeeId = $("#employeelistId").val();
    var financial_year = $("#financialyearId").val();

    if (employeeId != null && employeeId !== '' && financial_year !== '' && financial_year != null) {

        //Personal Information
        $("#empNameId").val("");
        $("#GenderId").val("");
        $("#dobId").val("");
        $("#pannoId").val("");


        //Salary Income
        $("#curremployergrossId").val("");
        $("#estimatedsalId").val("");
        $("#supbillId").val("");
        $("#estisupbillId").val("");


        $("#grossincomeId").val("");

        //Exemptions
        $('#hrareceivedId').val("");
        $(".hra_yes_no").prop('checked', false);
        $(".metro_city").prop('checked', false);
        $(".Disability").prop('checked', false);
        $("#emphraId").val("");
        $("#empearnedbasicId").val("");
        $("#actualrentpaidonbasicId").val("");
        $("#rentpaidId").val("");
        $("#hraaspercityId").val("");
        $("#actualexemptionId").val("");

        $("#hra_notreceived_rentpaidId").val("");
        $("#twentyfive_percentoftotalIncomeId").val("");
        $("#5K_per_monthId").val("");
        $("#actualrentpaidonIncomeId").val("");
        $("#actualexemption_hranotreceivedId").val("");

        // $("#rentpaidId").val(item.hra);

        $("#electionallowanceId").val("");
        $("#transportallowanceId").val("");
        $("#prevemployerprofessionaltaxId").val("");
        $("#proftaxId").val("");
        $("#exgratiaId").val("");
        $("#stddeductionId").val("");
        $("#totalexmpId").val("");
        $("#netsalaryId").val("");

        //other Investment
        $("#otherincome_investmentId").val("");
        $("#otherincome_otherinvestmentId").val("");
        $("#otherincome_totalinvestmentId").val("");


        //Income Tax Section

        //80D
        $("#80D_totalId").val("");


        //80G
        $("#80G_totalId").val("");
        $("#donationId").val("");
        $("#other_donationId").val("");
        $("#handicappedId").val("");

        //80C
        $("#80C_totalId").val("");
        $("#NCS_interestId").val("");
        $("#licId").val("");
        $("#gpfId").val("");
        // $("#dcps_1Id").val("");
        $("#dcps_1_estimatedId").val("");
        $("#gisId").val("");
        $("#other_gisId").val("");
        $("#ppfId").val("");
        $("#nscId").val("");
        $("#pliId").val("");
        $("#other_pliId").val("");
        $("#housing_loan_repaymentId").val("");
        $("#other_housing_loan_repaymentId").val("");
        $("#other_licId").val("");
        $("#under_80cccId").val("");
        $("#infrastructure_bondId").val("");
        $("#peducation_feesIdliId").val("");

        //  80 CCD(1B)
        $("#80CCD_totalId").val("");
        $("#npsId").val("");
        $("#dcps_under80ccdId").val("");

        // 80E
        $("#80E_totalId").val("");
        $("#education_loanId").val("");

        // Section 24
        $("#section24Id").val("");
        $("#home_loan_interest_before").val("");
        $("#home_loan_interest_afterId").val("");
        $("#oth_home_loan_interest_beforeId").val("");
        $("#oth_home_loan_interest_afterId").val("");


        //  80DDB
        $("#80DDB_totalId").val("");
        $("#medical_treatmentId").val("");

        //80TTA
        $("#80TTA_totalId").val("");
        $("#Deduction_on_SB_InterestId").val("");

        //Tax Calculated
        $("#tax_paid_in_cashId").val("");
        $("#previous_employer_tax_deductionId").val("");
        $("#calculated_total_payable_tax_Id").val("");
        $("#total_taxable_salaryId").val("");
        $("#total_tax_payableId").val("");
        $("#Rebate_under_87A").val("");
        $("#tax_payable_tw_before_cess_Id").val("");
        $("#4_percent_edu_cess_Id").val("");
        $("#taxpayabletw_Id").val("");
        $("#difftaxpayableId").val("");
        $("#actual_tax_deductedId").val("");
        $("#dec_tax_deductedId").val("");
        $("#tax_pending").val("");
        $("#tax_refunded").val("");
        $("#nexttwomonthId").val("");
        $("#user_requested_deductionId").val("");
        $("#taxcalculatedslab").html("");


        $.ajax({
            url: "GetEmployeeTaxDetail/" + financial_year + "/" + employeeId,
            type: 'GET',
            datatype: "json",
            // traditional: true,
            success: function (data) {


                if (data !== "[]") {

                    $("#PersonalInformation").css("display", 'block');
                    $.each(JSON.parse(data), function (i, item) {
                        // declare variable


                        GrossIncome = item.gross_income;

                        //Personal Information
                        $("#empNameId").val(item.EmployeeName);
                        $("#GenderId").val(item.parametervalue_eng);
                        $("#dobId").val(item.DateOfBirth);
                        $("#pannoId").val(item.PanNo);


                        //Salary Income
                        $("#prevemployergrossId").val(item.previous_employer_gross);
                        $("#curremployergrossId").val(item.gross_salary);
                        $("#estimatedsalId").val(item.estimated_salary);
                        $("#supbillId").val(item.supplementary_bill);
                        $("#estisupbillId").val(item.estimated_supplementary_bill);


                        $("#grossincomeId").val(item.gross_income);

                        //Exemptions
                        $("#hrareceivedId").val(item.hra);

                        if (item.hra_given === 1) {
                            $("input[type='radio'][name='hra_yes_no'][value= '" + "true" + "']").prop('checked', true);
                            $(".hra_received").css("display", "block");
                            $(".hra_notreceived").css("display", "none");
                            $("#rentpaidId").val(item.RentPaid);
                            if (item.MetroCity == 1) {
                                $("input[type='radio'][name='metro_city'][value= '" + "true" + "']").prop('checked', true);
                            } else if (item.MetroCity == 0) {
                                $("input[type='radio'][name='metro_city'][value= '" + "false" + "']").prop('checked', true);
                            }

                            $("#actualrentpaidonbasicId").val(item.ActualRentPaidfrombasic);
                            $("#hraaspercityId").val(item.HraAmountCity);
                            $("#actualexemptionId").val(item.ActualExemption_hra);


                        } else if (item.hra_given === 0) {
                            $("input[type='radio'][name='hra_yes_no'][value= '" + "false" + "']").prop('checked', true);
                            $(".hra_received").css("display", "none");
                            $(".hra_notreceived").css("display", "block");
                            $("#hra_notreceived_rentpaidId").val(item.RentPaid_hranotreceived);
                            $("#actualrentpaidonIncomeId").val(item.ActualRentpaidfromtotalIncome);
                            $("#twentyfive_percentoftotalIncomeId").val(item.Twentyfivepercentincome);
                            $("#5K_per_monthId").val(item.fivethousandpermonth);
                            $("#actualexemption_hranotreceivedId").val(item.fivethousandpermonth);
                        }
                        // item.hra_given===1?item.hra_given=1:item.hra_given=0;


                        // $("#rentpaidId").val(item.RentPaid);
                        // $("#metrocity_yesId").val(item.hra);
                        // $("#metrocity_yesId").val(item.hra);
                        $("#electionallowanceId").val(item.election_allowance);
                        $("#transportallowanceId").val(item.transport_allowance);
                        $("#prevemployerprofessionaltaxId").val(item.previous_employer_professional_tax);
                        $("#proftaxId").val(item.professional_tax);
                        $("#exgratiaId").val(item.ex_gratia);
                        $("#stddeductionId").val(item.standard_deduction);
                        $("#totalexmpId").val(item.total_exemptions);
                        $("#netsalaryId").val(item.net_salary);

                        //other Investment
                        $("#otherincome_investmentId").val(item.investments);
                        $("#otherincome_otherinvestmentId").val(item.other_income);
                        $("#otherincome_totalinvestmentId").val(item.total_other_income);


                        //Income Tax Section


                        //80D

                        $("#80D_totalId").val(item.mediclaim);
                        $("#80D_deductedId").val(item.D_80);
                        $("#health_checkupId").val(item.other_health_insurance);

                        $("#familymedicliam_lessthanId").val(item.Individual_less_than60);
                        $("#familymediclaim_morethanId").val(item.Indiviudal_more_than60);
                        $("#parents_lessthanId").val(item.Parents_less_than60);
                        $("#parentsmediclaim_morethanId").val(item.Parents_more_than60);


                        //80G
                        $("#80G_totalId").val(item.G_80);
                        $("#donationId").val(item.donation);
                        $("#other_donationId").val(item.other_donation);
                        $("#80G_deductedId").val(item.G_80);

                        //80C
                        $("#80C_totalId").val(item.total_80C);
                        $("#80C_deductedId").val(item.CCC_80);
                        $("#NCS_interestId").val(item.nsc_interest);
                        $("#licId").val(item.lic);
                        $("#gpfId").val(item.gpf);
                        // $("#dcps_1Id").val(item.dcps1);
                        $("#dcps_1_estimatedId").val(item.dcps1_estimated);
                        $("#gisId").val(item.gis);
                        $("#other_gisId").val(item.other_gis);
                        $("#ppfId").val(item.ppf);
                        $("#nscId").val(item.nsc);
                        $("#pliId").val(item.pli);
                        $("#other_pliId").val(item.other_pli);
                        $("#housing_loan_repaymentId").val(item.housing_loan_repayment);
                        $("#other_housing_loan_repaymentId").val(item.other_housing_loan_repayment);
                        $("#other_licId").val(item.other_lic);
                        $("#under_80cccId").val(item.under_80ccc);
                        $("#infrastructure_bondId").val(item.infrastructure_bond);
                        $("#education_feesId").val(item.education_fees);

                        //  80 CCD(1B)
                        $("#80CCD_totalId").val(item.total_80CCD);
                        $("#80CCD_deductedId").val(item.CCD80_B1);
                        $("#npsId").val(item.NPS);
                        $("#dcps_under80ccdId").val(item.under_80ccd);

                        // 80E
                        $("#80E_totalId").val(item.E_80);
                        $("#80E_deductedId").val(item.E_80);
                        $("#education_loanId").val(item.education_loan);

                        // Section 24
                        $("#section24Id").val(item.Section_24Total);
                        $("#sectiondeducted24Id").val(item.Section_24);
                        $("#home_loan_interest_beforeId").val(item.home_loan_interest_before);
                        $("#home_loan_interest_afterId").val(item.home_loan_interest_after);
                        $("#oth_home_loan_interest_beforeId").val(item.oth_home_loan_interest_before);
                        $("#oth_home_loan_interest_afterId").val(item.oth_home_loan_interest_after);


                        //  80DDB
                        $("#80DDB_totalId").val(item.total_80DDB);
                        $("#80DDB_deductedId").val(item.DDB_80);

                        $("#medical_treatmentId").val(item.medical_treatment);

                        //80TTA
                        $("#80TTA_totalId").val(item.TTA_80);
                        $("#80TTA_deductedId").val(item.DDB_80);
                        $("#Deduction_on_SB_InterestId").val(item.deduction_on_SB_interest);

                        //80U

                        $("#80U_deductedId").val(item.U_80);
                        $("#80U_totalId").val(item.handicapped);
                        $("#handicappedId").val(item.handicapped);
                        $("input[type='radio'][name='Disability'][value= '" + item.Disability + "']").prop('checked', true);


                        //Tax Calculated
                        $("#tax_paid_in_cashId").val(item.tax_paid_in_cash);
                        $("#previous_employer_tax_deductionId").val(item.previous_employer_tax_deduction);
                        $("#calculated_total_payable_tax_Id").val(item.Calculated_by_TW);
                        // $("#total_taxable_salaryId").val(item.total_taxable_salary);
                        // $("#total_tax_payableId").val(item.total_tax_payable);

                        $("#taxpayabletw_Id").val(item.tax_payable_technowin);

                        if ((item.Rebate_under_87A) === 1) {
                            $("#Rebate_under_87AId").prop("checked", false);

                        } else {
                            $("#Rebate_under_87AId").prop("checked", true);

                        }

                        $("#Rebate_AmountId").val(item.Rebated_Amount);
                        $("#Tax_payableId").val(item.tax_payable);

                        $("#tax_payable_tw_before_cess_Id").val(item.Tax_payable_technowin_before_cess);
                        $("#4_percent_edu_cess_Id").val(item.Per_4_edu_ces);

                        $("#difftaxpayableId").val(item.DiffTaxPayable);
                        $("#actual_tax_deductedId").val(item.actual_tax_deducted);
                        $("#dec_tax_deductedId").val(item.tax_deducted);

                        $("#tax_pendingId").val(item.tax_pending);
                        $("#tax_refundedId").val(item.tax_refunded);
                        $("#remainingmonthtaxId").val(item.tax_for_remaining_months);
                        $("#user_requested_deductionId").val(item.user_requested_deduction);
                        $("#user_requested_reason_deductionId").val(item.user_requested_reason);
                        //empty table
                        $("#taxcalculatedslab").html("");

                        // TotalOtherInvestment();
                        // Total80D();
                        // Total80G();
                        // Total80C();
                        // Total80CCD();
                        // Total80E();
                        // TotalSection24();
                        // Total80DDB();
                        // Total80TTA();
                        // Total80U();
                    });
                } else {
                    $("#PersonalInformation").css("display", 'none');
                    // declare variable

                    //Personal Information
                    $("#empNameId").val("");
                    $("#GenderId").val("");
                    $("#dobId").val("");
                    $("#pannoId").val("");


                    //Salary Income
                    $("#prevemployergrossId").val("");
                    $("#curremployergrossId").val("");
                    $("#estimatedsalId").val("");
                    $("#supbillId").val("");
                    $("#estisupbillId").val("");


                    $("#grossincomeId").val("");

                    //Exemptions
                    $('#hrareceivedId').val("");
                    $("#rentpaidId").val("");
                    $("#actualrentpaidonbasicId").val("");
                    $("#hraaspercityId").val("");
                    $("#actualexemptionId").val("");
                    $("#electionallowanceId").val("");
                    $("#transportallowanceId").val("");
                    $("#prevemployerprofessionaltaxId").val("");
                    $("#proftaxId").val("");
                    $("#exgratiaId").val("");
                    $("#stddeductionId").val("");
                    $("#totalexmpId").val("");
                    $("#netsalaryId").val("");


                    $("#hra_notreceived_rentpaidId").val("");
                    $("#actualrentpaidonIncomeId").val("");
                    $("#twentyfive_percentoftotalIncomeId").val("");
                    $("#5K_per_monthId").val("");
                    $("#actualexemption_hranotreceivedId").val("");


                    //other Investment
                    $("#otherincome_investmentId").val("");
                    $("#otherincome_otherinvestmentId").val("");
                    $("#otherincome_totalinvestmentId").val("");


                    //Income Tax Section

                    //80D
                    $("#80D_totalId").val("");
                    $("#80D_deductedId").val("");
                    $("#health_checkupId").val("");
                    $("#familymedicliam_lessthanId").val("");
                    $("#familymediclaim_morethanId").val("");
                    $("#parents_lessthanId").val("");
                    $("#parentsmediclaim_morethanId").val("");


                    //80G
                    $("#80G_totalId").val("");
                    $("#donationId").val("");
                    $("#other_donationId").val("");
                    $("#handicappedId").val("");
                    $("#80G_deductedId").val("");

                    //80C
                    $("#80C_totalId").val("");
                    $("#80C_deductedId").val("");
                    $("#NCS_interestId").val("");
                    $("#licId").val("");
                    $("#gpfId").val("");
                    // $("#dcps_1Id").val("");
                    $("#dcps_1_estimatedId").val("");
                    $("#gisId").val("");
                    $("#other_gisId").val("");
                    $("#ppfId").val("");
                    $("#nscId").val("");
                    $("#pliId").val("");
                    $("#other_pliId").val("");
                    $("#housing_loan_repaymentId").val("");
                    $("#other_housing_loan_repaymentId").val("");
                    $("#other_licId").val("");
                    $("#under_80cccId").val("");
                    $("#infrastructure_bondId").val("");
                    $("#education_feesIdliId").val("");

                    //  80 CCD(1B)
                    $("#80CCD_totalId").val("");
                    $("#80CCD_deductedId").val("");
                    $("#npsId").val("");
                    $("#dcps_under80ccdId").val("");

                    // 80E
                    $("#80E_totalId").val("");
                    $("#80E_deductedId").val("");
                    $("#education_loanId").val("");

                    // Section 24
                    $("#section24Id").val("");
                    $("#sectiondeducted24Id").val("");
                    $("#home_loan_interest_beforeId").val("");
                    $("#home_loan_interest_afterId").val("");
                    $("#oth_home_loan_interest_beforeId").val("");
                    $("#oth_home_loan_interest_afterId").val("");


                    //  80DDB
                    $("#80DDB_totalId").val("");
                    $("#medical_treatmentId").val("");
                    $("#80DDB_deductedId").val("");
                    //80TTA
                    $("#80TTA_totalId").val("");
                    $("#80TTA_deductedId").val("");
                    $("#Deduction_on_SB_InterestId").val("");
//80U
                    $("#80U_deductedId").val("");
                    $("#80U_totalId").val("");
                    $("#handicappedId").val("");
                    $("input[type='radio'][name='Disability'][value= '" + "" + "']").prop('checked', true);

                    //Tax Calculated
                    $("#tax_paid_in_cashId").val("");
                    $("#previous_employer_tax_deductionId").val("");
                    $("#calculated_total_payable_tax_Id").val("");
                    $("#total_taxable_salaryId").val("");
                    $("#total_tax_payableId").val("");
                    $("#Rebate_under_87A").val("");
                    $("#tax_payable_tw_before_cess_Id").val("");
                    $("#4_percent_edu_cess_Id").val("");
                    $("#taxpayabletw_Id").val("");
                    $("#difftaxpayableId").val("");
                    $("#actual_tax_deductedId").val("");
                    $("#dec_tax_deductedId").val("");
                    $("#tax_pendingId").val("");
                    $("#tax_refundedId").val("");
                    $("#nexttwomonthId").val("");
                    $("#user_requested_deductionId").val("");
                    $("#taxcalculatedslab").html("");

                }


            }
        });


    }

});

$("#prevemployergrossId").change(function () {

    if ($("#prevemployergrossId").val() != null && $("#prevemployergrossId").val() != '') {
        PrevEmployeeGross = $("#prevemployergrossId").val();
        CurrentEmployerSalary = $("#curremployergrossId").val();
        EstimatedSal = $("#estimatedsalId").val();
        SupllimentaryBill = $("#supbillId").val();
        EstimatedSupBill = $("#estisupbillId").val();
        var totalgross = parseFloat(PrevEmployeeGross) + parseFloat(CurrentEmployerSalary) + parseFloat(EstimatedSal) + parseFloat(SupllimentaryBill) + parseFloat(EstimatedSupBill);
        $("#grossincomeId").val(totalgross);
        calnetsalary();
        TaxCalculatedByTechnowin();
    } else {
        $("#grossincomeId").val(GrossIncome);
        calnetsalary();
        TaxCalculatedByTechnowin();
    }
});

$("#curremployergrossId").change(function () {
    debugger;
    if ($("#curremployergrossId").val() != null && $("#curremployergrossId").val() != '') {
        PrevEmployeeGross = $("#prevemployergrossId").val() == null || $("#prevemployergrossId").val() == '' ?0:$("#prevemployergrossId").val();
        CurrentEmployerSalary = $("#curremployergrossId").val() == null || $("#curremployergrossId").val() == ''?0: $("#curremployergrossId").val();
        EstimatedSal = $("#estimatedsalId").val() == null || $("#estimatedsalId").val() == ''?0: $("#estimatedsalId").val();
        SupllimentaryBill = $("#supbillId").val() == null || $("#supbillId").val() == ''?0:  $("#supbillId").val();
        EstimatedSupBill = $("#estisupbillId").val() == null || $("#estisupbillId").val() == ''?0:  $("#estisupbillId").val();
        var totalgross = parseFloat(PrevEmployeeGross) + parseFloat(CurrentEmployerSalary) + parseFloat(EstimatedSal) + parseFloat(SupllimentaryBill) + parseFloat(EstimatedSupBill);
        $("#grossincomeId").val(totalgross);
        calnetsalary();
        TaxCalculatedByTechnowin();
    } else {
        $("#grossincomeId").val(GrossIncome);
        calnetsalary();
        TaxCalculatedByTechnowin();
    }
});

$("#estimatedsalId").change(function () {
    debugger;
    if ($("#estimatedsalId").val() != null && $("#estimatedsalId").val() != '') {
        PrevEmployeeGross = $("#prevemployergrossId").val() == null || $("#prevemployergrossId").val() == '' ?0:$("#prevemployergrossId").val();
        CurrentEmployerSalary = $("#curremployergrossId").val() == null || $("#curremployergrossId").val() == ''?0: $("#curremployergrossId").val();
        EstimatedSal = $("#estimatedsalId").val() == null || $("#estimatedsalId").val() == ''?0: $("#estimatedsalId").val();
        SupllimentaryBill = $("#supbillId").val() == null || $("#supbillId").val() == ''?0:  $("#supbillId").val();
        EstimatedSupBill = $("#estisupbillId").val() == null || $("#estisupbillId").val() == ''?0:  $("#estisupbillId").val();
        var totalgross = $("#grossincomeId").val(parseFloat(PrevEmployeeGross) + parseFloat(CurrentEmployerSalary) + parseFloat(EstimatedSal) + parseFloat(SupllimentaryBill) + parseFloat(EstimatedSupBill));

        calnetsalary();
        TaxCalculatedByTechnowin();
    } else {
        $("#grossincomeId").val(GrossIncome);
        calnetsalary();
        TaxCalculatedByTechnowin();
    }
});
$("#supbillId").change(function () {
    debugger;
    if ($("#supbillId").val() != null && $("#supbillId").val() != '') {
        PrevEmployeeGross = $("#prevemployergrossId").val() == null || $("#prevemployergrossId").val() == '' ?0:$("#prevemployergrossId").val();
        CurrentEmployerSalary = $("#curremployergrossId").val() == null || $("#curremployergrossId").val() == ''?0: $("#curremployergrossId").val();
        EstimatedSal = $("#estimatedsalId").val() == null || $("#estimatedsalId").val() == ''?0: $("#estimatedsalId").val();
        SupllimentaryBill = $("#supbillId").val() == null || $("#supbillId").val() == ''?0:  $("#supbillId").val();
        EstimatedSupBill = $("#estisupbillId").val() == null || $("#estisupbillId").val() == ''?0:  $("#estisupbillId").val();
        var totalgross = $("#grossincomeId").val(parseFloat(PrevEmployeeGross) + parseFloat(CurrentEmployerSalary) + parseFloat(EstimatedSal) + parseFloat(SupllimentaryBill) + parseFloat(EstimatedSupBill));

        calnetsalary();
        TaxCalculatedByTechnowin();
    } else {
        $("#grossincomeId").val(GrossIncome);
        calnetsalary();
        TaxCalculatedByTechnowin();
    }
});

$("#estisupbillId").change(function () {
    debugger;
    if ($("#estisupbillId").val() != null && $("#estisupbillId").val() != '') {
        PrevEmployeeGross = $("#prevemployergrossId").val() == null || $("#prevemployergrossId").val() == '' ?0:$("#prevemployergrossId").val();
        CurrentEmployerSalary = $("#curremployergrossId").val() == null || $("#curremployergrossId").val() == ''?0: $("#curremployergrossId").val();
        EstimatedSal = $("#estimatedsalId").val() == null || $("#estimatedsalId").val() == ''?0: $("#estimatedsalId").val();
        SupllimentaryBill = $("#supbillId").val() == null || $("#supbillId").val() == ''?0:  $("#supbillId").val();
        EstimatedSupBill = $("#estisupbillId").val() == null || $("#estisupbillId").val() == ''?0:  $("#estisupbillId").val();
        var totalgross = $("#grossincomeId").val(parseFloat(PrevEmployeeGross) + parseFloat(CurrentEmployerSalary) + parseFloat(EstimatedSal) + parseFloat(SupllimentaryBill) + parseFloat(EstimatedSupBill));

        calnetsalary();
        TaxCalculatedByTechnowin();
    } else {
        $("#grossincomeId").val(GrossIncome);
        calnetsalary();
        TaxCalculatedByTechnowin();
    }
});

//-------------------------------------------------TotalExemption------------------------------------------------------>
function claimHra() {


    // $("#hrarules").css("display", "block");

    $("#claimhravalueId").val($("#claimhravalueId").val() === "0" ? "1" : "0");

    $("#claimhraId").val($("#claimhraId").val() === "Claim" ? "UnClaim" : "Claim");

    if ($("#claimhravalueId").val() === "1") {
        $("#hrarules").css("display", "block");

    } else if ($("#claimhravalueId").val() === "0") {
        $("#hrarules").css("display", "none");

        //Exemptions
        $('#hrareceivedId').val("");
        $(".hra_yes_no").prop('checked', false);
        $(".metro_city").prop('checked', false);
        $(".Disability").prop('checked', false);
        $("#emphraId").val("");
        $("#empearnedbasicId").val("");
        $("#actualrentpaidonbasicId").val("");
        $("#rentpaidId").val("");
        $("#hraaspercityId").val("");
        $("#actualexemptionId").val("");

        $("#hra_notreceived_rentpaidId").val("");
        $("#twentyfive_percentoftotalIncomeId").val("");
        $("#5K_per_monthId").val("");
        $("#actualrentpaidonIncomeId").val("");
        $("#actualexemption_hranotreceivedId").val("");

        // if user clicks onn unclaim
        TotalExemption();
    }


//get Hra and earned basic
    $.ajax({

        url: "/GetHraAndEarnedBasic/" + $("#financialyearId").val() + "/" + $("#employeelistId").val(),
        type: 'GET',
        datatype: "json",
        traditional: true,
        success: function (data) {
            $.each(JSON.parse(data), function (i, item) {
                $("#emphraId").val(item.TotalHouseRentAllowance);
                $("#empearnedbasicId").val(item.FinalBasic);
            })

        }
    });

    function hra_received() {

        $(".hra_received").css("display", "block");
        $(".hra_notreceived").css("display", "none");
        // hra calculation
        //Rent paid calculation ---------------------> 10% of (Basic salary + Dearness allowance)
        $("#rentpaidId").change(function () {

            var rent_paid =parseFloat( $("#rentpaidId").val());
            var earned_basic = parseFloat($("#empearnedbasicId").val());
            var percent_of_basic = parseFloat((0.1 * earned_basic).toFixed(2));
            // 10% of (Basic salary + Dearness allowance)
            var tenpercent_basic_da;
            if (percent_of_basic >= rent_paid) {
                tenpercent_basic_da = percent_of_basic - rent_paid;
            } else if (rent_paid > percent_of_basic) {
                tenpercent_basic_da = rent_paid - percent_of_basic;
            }
            $("#actualrentpaidonbasicId").val(tenpercent_basic_da.toFixed(2));
            lowestvalueforExemption()
        });
        $(".metro_city").change(function () {

            var metro_city = $("input[type='radio'][name='metro_city']:checked").val();
            var earned_basic = $("#empearnedbasicId").val();
            var rent_as_perCity = "";
            if (metro_city === "true") {
                rent_as_perCity = (0.5 * earned_basic).toFixed(2);
                $("#hraaspercityId").val(rent_as_perCity);
                lowestvalueforExemption();
            } else {
                rent_as_perCity = (0.4 * earned_basic).toFixed(2);
                $("#hraaspercityId").val(rent_as_perCity);
                lowestvalueforExemption();
            }


        });


        function lowestvalueforExemption() {

            var hra = Number($("#emphraId").val());
            var actualrentpaid = Number($("#actualrentpaidonbasicId").val());
            var hracity = Number($("#hraaspercityId").val());


            if (hra !== null || actualrentpaid !== null || hracity !== null) {

                if (hra <= actualrentpaid && hra <= hracity) {
                    $("#actualexemptionId").val(hra);
                } else if (actualrentpaid <= hra && actualrentpaid <= hracity) {
                    $("#actualexemptionId").val(actualrentpaid);
                } else {
                    $("#actualexemptionId").val(hracity);
                }

            }

        }

    }

    function hra_notreceived() {
        debugger;
        $(".hra_received").css("display", "none");
        $(".hra_notreceived").css("display", "block");

        var rent_paid = "";
        var income = $("#grossincomeId").val();
        var twentyfivepercentofIncome = (0.25 * income).toFixed(2);
        var fivethousandpermonth = (12 * 5000).toFixed(2);

        var actualrentpaid = "";


        $("#hra_notreceived_rentpaidId").change(function () {
            rent_paid = $("#hra_notreceived_rentpaidId").val();
            var tenpercentincome = (0.1 * income).toFixed(2);
            if (rent_paid >= tenpercentincome) {
                actualrentpaid = rent_paid - tenpercentincome;
            } else if (tenpercentincome > rent_paid) {
                actualrentpaid = tenpercentincome - rent_paid;
            }
            $("#actualrentpaidonIncomeId").val(Math.abs(actualrentpaid));
            $("#5K_per_monthId").val(fivethousandpermonth);
            $("#twentyfive_percentoftotalIncomeId").val(twentyfivepercentofIncome);

            if (actualrentpaid !== null || twentyfivepercentofIncome !== null || fivethousandpermonth !== null) {

                if (actualrentpaid <= twentyfivepercentofIncome && actualrentpaid <= fivethousandpermonth) {
                    $("#actualexemption_hranotreceivedId").val(actualrentpaid);
                } else if (twentyfivepercentofIncome <= actualrentpaid && twentyfivepercentofIncome <= fivethousandpermonth) {
                    $("#actualexemption_hranotreceivedId").val(twentyfivepercentofIncome);
                } else {
                    $("#actualexemption_hranotreceivedId").val(fivethousandpermonth);
                }

            }


        });


    }


    $(".hra_yes_no").change(function () {

        let hra_yes_no = $("input[type='radio'][name='hra_yes_no']:checked").val();
        if (hra_yes_no === "true") {
            hra_received();

        } else if (hra_yes_no === "false") {
            hra_notreceived();
        }


    });


}


function TotalOtherInvestment() {


    var investment = $("#otherincome_investmentId").val();
    var other_investment = $("#otherincome_otherinvestmentId").val();
    var totalinvestment = '';
    if (investment == null && investment == "") {
        investment = 0;
    }
    if (other_investment == null && other_investment == "") {
        other_investment = 0;
    }
    totalinvestment = Number(investment) + Number(other_investment);
    $("#otherincome_totalinvestmentId").val(totalinvestment);

    TaxCalculatedByTechnowin();
}

//CLose Hra Div
function ClosehRadiv() {

    // On closing hra calculation box
    var hra = $("#actualexemptionId").val();
    var hra_hranotreceived = $("#actualexemption_hranotreceivedId").val();
    var hra_yes_no = $("input[type='radio'][name='hra_yes_no']:checked").val();
    $("#hrarules").css("display", "none");

    if (hra_yes_no === "true") {
        $("#hrareceivedId").val(hra);
    } else {
        $("#hrareceivedId").val(hra_hranotreceived);
    }

    TotalExemption();

}

// Sumation of Total Exemption
//-------------------------------------------------TotalExemption------------------------------------------------------>
function TotalExemption() {

    var hre = $("#hrareceivedId").val() == "" ? 0 : parseFloat($("#hrareceivedId").val());
    var preproftex = $("#prevemployerprofessionaltaxId").val() == "" ? 0 : parseFloat($("#prevemployerprofessionaltaxId").val());
    var elecallowance = $("#electionallowanceId").val() == "" ? 0 : parseFloat($("#electionallowanceId").val());
    var transportallowance = $("#transportallowanceId").val() == "" ? 0 : parseFloat($("#transportallowanceId").val());
    var stddeduction = $("#stddeductionId").val() == "" ? 0 : parseFloat($("#stddeductionId").val());
    var proftax = $("#proftaxId").val() == "" ? 0 : parseFloat($("#proftaxId").val());
    var exgratia = $("#exgratiaId").val() == "" ? 0 : parseFloat($("#exgratiaId").val());

    var total = $("#totalexmpId").val(hre + preproftex + elecallowance + transportallowance + stddeduction + proftax + exgratia);
    // total exemption
    calnetsalary();
    TaxCalculatedByTechnowin();
}


function calnetsalary() {

    var totalexmp = $("#totalexmpId").val();
    var grossIncome = $("#grossincomeId").val();
    $("#netsalaryId").val(grossIncome - totalexmp);
    TaxCalculatedByTechnowin();
};


//----------------------------------------80D--------------------------------------------------------------------->


function Total80D(id) {



    //only parents
    var parents_lessthan = $("#parents_lessthanId").val() === "" ? 0 : parseFloat($("#parents_lessthanId").val());

    var parentsmediclaim_morethan = $("#parentsmediclaim_morethanId").val() === "" ? 0 : parseFloat($("#parentsmediclaim_morethanId").val());


    //Spouse Inividual
    var familymedicliam_lessthan = $("#familymedicliam_lessthanId").val() === "" ? 0 : Math.abs($("#familymedicliam_lessthanId").val());


    var familymediclaim_morethan = $("#familymediclaim_morethanId").val() === "" ? 0 : parseFloat($("#familymediclaim_morethanId").val());
    debugger;

    if(parents_lessthan!=null && parents_lessthan!==0){
        $("#parentsmediclaim_morethanId").prop("readonly", true);
    }else if(parentsmediclaim_morethan!=null && parentsmediclaim_morethan!==0){
        $("#parents_lessthanId").prop("readonly", true);
    }else{
        $("#parentsmediclaim_morethanId").prop("readonly", false);
        $("#parents_lessthanId").prop("readonly", false);
    }

    if(familymedicliam_lessthan!=null && familymedicliam_lessthan!==0){
        $("#familymediclaim_morethanId").prop("readonly", true);
    }else if(familymediclaim_morethan!=null && familymediclaim_morethan!==0){
        $("#familymedicliam_lessthanId").prop("readonly", true);
    }else{
        $("#familymediclaim_morethanId").prop("readonly", false);
        $("#familymedicliam_lessthanId").prop("readonly", false);
    }








    var health_checkup = $("#health_checkupId").val() === "" ? 0 : parseFloat($("#health_checkupId").val());
    //health check up should always be 5000 that it is checked here
    if (health_checkup > 5000) {
        health_checkup = 5000;
        $("#health_checkupId").val(5000)
    } else {
        health_checkup;
    }
    var total80D = familymedicliam_lessthan + parents_lessthan + familymediclaim_morethan + parentsmediclaim_morethan + health_checkup;
    $("#80D_totalId").val(total80D);
    //checking deduction
    if (parents_lessthan > 25000) {
        parents_lessthan = 25000;
    } else {
        parents_lessthan;
    }
    if (parentsmediclaim_morethan > 50000) {
        parentsmediclaim_morethan = 50000;
    } else {
        parentsmediclaim_morethan;
    }
    if (familymedicliam_lessthan > 25000) {
        familymedicliam_lessthan = 25000;
    } else {
        familymedicliam_lessthan;
    }
    if (familymediclaim_morethan > 50000) {
        familymediclaim_morethan = 50000;
    } else {
        familymediclaim_morethan;
    }

    // totaling deduction
    var totalDeducted80D = familymedicliam_lessthan + parents_lessthan + familymediclaim_morethan + parentsmediclaim_morethan + health_checkup;

    $("#80D_deductedId").val(totalDeducted80D);
    //Deduction validation
    // if (total80D > 100000) {
    //     $("#80D_deductedId").val(100000)
    // } else {
    //     $("#80D_deductedId").val(total80D)
    // }


    TaxCalculatedByTechnowin();
}


//----------------------------------------80G--------------------------------------------------------------------->

function Total80G() {


    var donation = $("#donationId").val() === "" ? 0 : parseFloat($("#donationId").val());
    var other_donation = $("#other_donationId").val() === "" ? 0 : parseFloat($("#other_donationId").val());

    var total80G = donation + other_donation;
    $("#80G_totalId").val(total80G);
    $("#80G_deductedId").val(total80G);
    TaxCalculatedByTechnowin();
}


//---------------------------------------------80C-------------------------------------------------------------------->
function Total80C() {

    var nsc_interest = $("#NCS_interestId").val() === "" ? 0 : parseFloat($("#NCS_interestId").val());
    var nsc = $("#nscId").val() === "" ? 0 : parseFloat($("#nscId").val());

    var lic = $("#licId").val() === "" ? 0 : parseFloat($("#licId").val());
    var other_lic = $("#other_licId").val() === "" ? 0 : parseFloat($("#other_licId").val());


    var gpf = $("#gpfId").val() === "" ? 0 : parseFloat($("#gpfId").val());

    // var dcps1 = $("#dcps_1Id").val() === "" ? 0 : parseFloat($("#dcps_1Id").val());
    var dcps_estimated1 = $("#dcps_1_estimatedId").val() === "" ? 0 : parseFloat($("#dcps_1_estimatedId").val());

    var gis = $("#gisId").val() === "" ? 0 : parseFloat($("#gisId").val());
    var other_gis = $("#other_gisId").val() === "" ? 0 : parseFloat($("#other_gisId").val());

    var ppf = $("#ppfId").val() === "" ? 0 : parseFloat($("#ppfId").val());

    var pli = $("#pliId").val() === "" ? 0 : parseFloat($("#pliId").val());
    var other_pli = $("#other_pliId").val() === "" ? 0 : parseFloat($("#other_pliId").val());

    var housing_loan_repayment = $("#housing_loan_repaymentId").val() === "" ? 0 : parseFloat($("#housing_loan_repaymentId").val());
    var other_housing_loan_repayment = $("#other_housing_loan_repaymentId").val() === "" ? 0 : parseFloat($("#other_housing_loan_repaymentId").val());

    var under_80ccc = $("#under_80cccId").val() === "" ? 0 : parseFloat($("#under_80cccId").val());

    var infrastructure_bond = $("#infrastructure_bondId").val() === "" ? 0 : parseFloat($("#infrastructure_bondId").val());
    var education_fees = $("#education_feesId").val() === "" ? 0 : parseFloat($("#education_feesId").val());


    var total80C = nsc_interest + nsc + lic + other_lic + gpf + dcps_estimated1 + gis + other_gis + ppf + pli + other_pli + housing_loan_repayment + other_housing_loan_repayment + under_80ccc +
        infrastructure_bond + education_fees;

    $("#80C_totalId").val(total80C);

    if (total80C > 150000) {
        $("#80C_deductedId").val(150000);
    } else {
        $("#80C_deductedId").val(total80C);
    }
    TaxCalculatedByTechnowin();
}


//----------------------------------------80CCD--------------------------------------------------------------------->

function Total80CCD() {

    var nps = $("#npsId").val() === "" ? 0 : parseFloat($("#npsId").val());
    var dcps_under80ccd = $("#dcps_under80ccdId").val() === "" ? 0 : parseFloat($("#dcps_under80ccdId").val());

    var total80CCD = nps + dcps_under80ccd;
    $("#80CCD_totalId").val(total80CCD);

    if (total80CCD > 50000) {
        $("#80CCD_deductedId").val(50000);
    } else {
        $("#80CCD_deductedId").val(total80CCD);
    }
    TaxCalculatedByTechnowin();
}


//----------------------------------------80E--------------------------------------------------------------------->

function Total80E() {

    var education_loan = $("#education_loanId").val() === "" ? 0 : parseFloat($("#education_loanId").val());

    var total80E = education_loan;
    $("#80E_totalId").val(total80E);
    $("#80E_deductedId").val(total80E);
    TaxCalculatedByTechnowin();
}

//----------------------------------------Section24--------------------------------------------------------------------->

function TotalSection24() {

    var home_loan_interest_before = $("#home_loan_interest_beforeId").val() === "" ? 0 : parseFloat($("#home_loan_interest_beforeId").val());
    var home_loan_interest_after = $("#home_loan_interest_afterId").val() === "" ? 0 : parseFloat($("#home_loan_interest_afterId").val());
    var oth_home_loan_interest_before = $("#oth_home_loan_interest_beforeId").val() === "" ? 0 : parseFloat($("#oth_home_loan_interest_beforeId").val());
    var oth_home_loan_interest_after = $("#oth_home_loan_interest_afterId").val() === "" ? 0 : parseFloat($("#oth_home_loan_interest_afterId").val());

    var totalsection24 = home_loan_interest_before + home_loan_interest_after + oth_home_loan_interest_before + oth_home_loan_interest_after;


    $("#section24Id").val(totalsection24);
    //Deduction validation
    if (totalsection24 > 200000) {
        $("#sectiondeducted24Id").val(200000)
    } else {
        $("#sectiondeducted24Id").val(totalsection24)
    }

    // $("#sectiondeducted24Id").val(totalsection24);
    TaxCalculatedByTechnowin();
}


//----------------------------------------80DDB--------------------------------------------------------------------->

function Total80DDB() {

    var medical_treatment = $("#medical_treatmentId").val() === "" ? 0 : parseFloat($("#medical_treatmentId").val());

    var total80ddb = medical_treatment;

    $("#80DDB_totalId").val(total80ddb);

    if (total80ddb > 40000) {
        $("#80DDB_deductedId").val(40000);
    } else {
        $("#80DDB_deductedId").val(total80ddb);
    }
    TaxCalculatedByTechnowin();
}

//----------------------------------------80TTA--------------------------------------------------------------------->

function Total80TTA() {

    var Deduction_on_SB_Interest = $("#Deduction_on_SB_InterestId").val() === "" ? 0 : parseFloat($("#Deduction_on_SB_InterestId").val());

    var total80ddb = Deduction_on_SB_Interest;

    $("#80TTA_totalId").val(total80ddb);
    $("#80TTA_deductedId").val(total80ddb);
    TaxCalculatedByTechnowin();
}


//----------------------------------------80U--------------------------------------------------------------------->
var U80_deducted_limit;
$(".Disability").change(function () {

    U80_deducted_limit = $("input[type='radio'][name='Disability']:checked").val();
    parseFloat(U80_deducted_limit);
    Total80U();
});

function Total80U() {

    var percentdisabilti = U80_deducted_limit * 100;
    var handicapallowance = $("#handicappedId").val() === "" ? 0 : parseFloat($("#handicappedId").val());


    if (percentdisabilti === 40) {
        if (handicapallowance > 75000) {
            $("#80U_deductedId").val(75000);
            $("#80U_totalId").val(handicapallowance);
        } else {
            $("#80U_deductedId").val(handicapallowance);
            $("#80U_totalId").val(handicapallowance);
        }

    } else if (percentdisabilti === 60) {
        if (handicapallowance > 125000) {
            $("#80U_deductedId").val(125000);
            $("#80U_totalId").val(handicapallowance);
        } else {
            $("#80U_deductedId").val(handicapallowance);
            $("#80U_totalId").val(handicapallowance);
        }
    }


    TaxCalculatedByTechnowin();
}

//-----------------------------------------Tax Calculated--------------------------------------------------------------->

function TaxCalculatedByTechnowin() {

debugger;
    var netsalary = $("#netsalaryId").val() === "" ? 0 : parseFloat($("#netsalaryId").val());
    var otherincome_totalinvestment = $("#otherincome_totalinvestmentId").val() === "" ? 0 : parseFloat($("#otherincome_totalinvestmentId").val());

    //----------------------------------Deduction------------------------------------------------------------------------>
    var D_80G = $("#80D_deductedId").val() === "" ? 0 : parseFloat($("#80D_deductedId").val());
    var G_80 = $("#80G_deductedId").val() === "" ? 0 : parseFloat($("#80G_deductedId").val());
    var C_80 = $("#80C_deductedId").val() === "" ? 0 : parseFloat($("#80C_deductedId").val());
    var CCD_80 = $("#80CCD_deductedId").val() === "" ? 0 : parseFloat($("#80CCD_deductedId").val());
    var E_80 = $("#80E_deductedId").val() === "" ? 0 : parseFloat($("#80E_deductedId").val());
    var sectiondeducted24 = $("#sectiondeducted24Id").val() === "" ? 0 : parseFloat($("#sectiondeducted24Id").val());
    var DDB_80 = $("#80DDB_deductedId").val() === "" ? 0 : parseFloat($("#80DDB_deductedId").val());
    var TTA_80 = $("#80TTA_deductedId").val() === "" ? 0 : parseFloat($("#80TTA_deductedId").val());
    var U_80 = $("#80U_deductedId").val() === "" ? 0 : parseFloat($("#80U_deductedId").val());
    var tax_paid_in_cash = $("#tax_paid_in_cashId").val() === "" ? 0 : parseFloat($("#tax_paid_in_cashId").val());
    var total_payable_tax = (netsalary + otherincome_totalinvestment) - (D_80G + G_80 + C_80 + CCD_80 + E_80 + sectiondeducted24 + DDB_80 + TTA_80 + U_80) ;
    $("#calculated_total_payable_tax_Id").val(total_payable_tax);

}

function CalculatePayableTaxBeforeCess() {

    var $total_taxable_amount = $("#calculated_total_payable_tax_Id").val() === "" ? 0 : parseFloat($("#calculated_total_payable_tax_Id").val());

    if ($total_taxable_amount !== 0) {
        $.ajax({

            url: "/Taxcalculation/" + $total_taxable_amount,
            type: 'GET',
            datatype: "json",
            traditional: true,
            success: function (data) {


                var taxpayablebeforecess;

                $.each(JSON.parse(data), function (i, item) {
                    taxpayablebeforecess = item.percentage;
                });

                $("#taxcalculatedslab").html("");
                var html = "<div class='p-1 pb-2'><h3> Slabwise Calculation </h3>" + "<table border='1' style='width: 100%  ' >" + "<th>Taxable Income</th>"
                    + "<th>Tax Rate</th>" + "<th>Taxable Amount</th>" + "<th>Income Tax</th>";
                $.each(JSON.parse(data), function (i, item) {
                    html +=
                        "<tr >" +
                        "<td >" + item.MinLimit + "-" + item.MaxLimit + "</td>" +
                        "<td >" + item.TaxRate + "</td>" +
                        "<td >" + item.slabAmount + "</td>" +
                        "<td >" + item.percentage + "</td>" +
                        "</tr>"
                    ;
                });
                html += "</table>" + "</div>";
                $("#taxcalculatedslab").append(html);

                $("#Tax_payableId").val(taxpayablebeforecess);

                CalulateTaxAfterCess();
                handleRebate();
            }
        });


    }

}

function CalulateTaxAfterCess() {
    debugger;
    //-----------------------------------Before Cess--------------------------------------------->
    var tax_payable_tw_before_cess = $("#Tax_payableId").val() === "" ? 0 : parseFloat($("#Tax_payableId").val()).toFixed(2);
    //-----------------------------------Edu Cess--------------------------------------------->
    var edu_cess = (0.04 * tax_payable_tw_before_cess).toFixed(2);
    $("#4_percent_edu_cess_Id").val(edu_cess);

    // //-----------------------------------Before Cess--------------------------------------------->
    // var tax_payable_tw_before_cess = $("#tax_payable_tw_before_cess_Id").val() === "" ? 0 : parseFloat($("#tax_payable_tw_before_cess_Id").val()).toFixed(2);
    // //-----------------------------------Edu Cess--------------------------------------------->
    // var edu_cess = (0.04 * tax_payable_tw_before_cess).toFixed(2);
    // $("#4_percent_edu_cess_Id").val(edu_cess);

    //-----------------------------------After Cess--------------------------------------------->


    var tax_payable_tw_After_cess = parseFloat(edu_cess) + parseFloat(tax_payable_tw_before_cess);
    var tax_payable_tw_After_cess_round = Math.round(tax_payable_tw_After_cess);
    $("#taxpayabletw_Id").val(tax_payable_tw_After_cess_round);
    //----------------------------------Tax Deducted--------------------------------------------->
    var deductedtax = $("#dec_tax_deductedId").val() === "" ? 0 : parseFloat($("#dec_tax_deductedId").val()).toFixed(2);
    var remainingMonth = parseInt($("#remainingmonthId").val());
    $bool= $("#Rebate_under_87AId").prop("checked");

    if($bool==true){
        tax_payable_tw_After_cess=0;
        remainingMonth=0;
    }
    var tax_pending =tax_payable_tw_After_cess  - deductedtax;
    var tax_pending_round = Math.round(tax_pending);
    $("#tax_pendingId").val(tax_pending_round);


    if (remainingMonth === 0) {
        $("#remainingmonthtaxId").val(tax_pending_round);
    } else {
        $("#remainingmonthtaxId").val(tax_pending_round / remainingMonth);
    }

}


// Generate Pdf

$("#printPdf").click(function () {
    var employeeId = $("#employeelistId").val();
    var financial_year = $("#financialyearId").val();
    var taxable_Income = $("#calculated_total_payable_tax_Id").val();
    if (employeeId != null && employeeId !== '' && financial_year !== '' && financial_year != null) {
        window.location.href = '/GenerateIncomeTaxPdf/' + financial_year + "/" + employeeId + "/" + taxable_Income;
    } else if (financial_year === '' || financial_year === null) {

        alert("Please Select Financial Year")
    } else {
        alert("Please Select an Employee")
    }


})
//If rebate is given

function handleRebate(){
    debugger;
    $bool= $("#Rebate_under_87AId").prop("checked");
    //tabel values
    $tax_payable_tw_before_cess_Id=$("#tax_payable_tw_before_cess_Id").val();
    $Rebate_amount=$("#Rebate_AmountId").val();
    $4_percent_edu_cess_Id=  $('#4_percent_edu_cess_Id').val();
    $taxpayabletw_Id= $('#taxpayabletw_Id').val();
    $remainingmonthtaxId= $('#remainingmonthtaxId').val();
    $tax_pendingId= $('#tax_pendingId').val();
    $tax_payableId= $('#Tax_payableId').val();
    //storing in hidden


    if($bool===true){
        $a=$("#tax_payable_tw_before_cess_Id").val();
        $b= $('#4_percent_edu_cess_Id').val();
        $c=$('#taxpayabletw_Id').val();
        $d=$('#remainingmonthtaxId').val();
        $e=$('#tax_pendingId').val();

        $("#Rebate_AmountId").val($tax_payableId);
        $("#tax_payable_tw_before_cess_Id").val(0);
        $('#4_percent_edu_cess_Id').val(0);
        $('#taxpayabletw_Id').val(0);
        $('#remainingmonthtaxId').val(0);
        // $('#tax_pendingId').val(0);

    }else if ($bool===false){

        $("#Rebate_AmountId").val(0);
        $('#tax_payable_tw_before_cess_Id').val($tax_payableId);
        $('#4_percent_edu_cess_Id').val($b);
        $('#taxpayabletw_Id').val($c);
        $('#remainingmonthtaxId').val($d);
        $('#tax_pendingId').val($e);

    }


}

function handleRebateAmount() {

    $Tax_payableId=$("#Tax_payableId").val();
    $Rebate_amount=$("#Rebate_AmountId").val();
    $('#tax_payable_tw_before_cess_Id').val(parseFloat($Tax_payableId)-parseFloat($Rebate_amount));

    $tax_payable_tw_before_cess=$('#tax_payable_tw_before_cess_Id').val();

    var edu_cess = (0.04 * $tax_payable_tw_before_cess).toFixed(2);
    $("#4_percent_edu_cess_Id").val(edu_cess);

    //-----------------------------------After Cess--------------------------------------------->


    var tax_payable_tw_After_cess = parseFloat(edu_cess) + parseFloat($tax_payable_tw_before_cess);
    var tax_payable_tw_After_cess_round = Math.round(tax_payable_tw_After_cess);
    $("#taxpayabletw_Id").val(tax_payable_tw_After_cess_round);

    //----------------------------------Tax Deducted--------------------------------------------->
    var deductedtax = $("#dec_tax_deductedId").val() === "" ? 0 : parseFloat($("#dec_tax_deductedId").val()).toFixed(2);

    var tax_pending = tax_payable_tw_After_cess - deductedtax;
    var tax_pending_round = Math.round(tax_pending);
    $("#tax_pendingId").val(tax_pending_round);

    var remainingMonth = parseInt($("#remainingmonthId").val());
    if (remainingMonth === 0) {
        $("#remainingmonthtaxId").val(tax_pending_round);
    } else {
        $("#remainingmonthtaxId").val(tax_pending_round / remainingMonth);
    }
}



function handletaxpaidincash(){
    debugger;
    // CalculatePayableTaxBeforeCess();
    CalulateTaxAfterCess();
    var tax_paid_in_cash= $("#tax_paid_in_cashId").val();
    var tax_payable_after_cess=$("#taxpayabletw_Id").val();

    var final_tax_payable_after_cess=parseFloat(tax_payable_after_cess)-parseFloat(tax_paid_in_cash);

    $("#taxpayabletw_Id").val(final_tax_payable_after_cess);

    //----------------------------------Tax Deducted--------------------------------------------->
    var deductedtax = $("#dec_tax_deductedId").val() === "" ? 0 : parseFloat($("#dec_tax_deductedId").val()).toFixed(2);

    var tax_pending = final_tax_payable_after_cess - deductedtax;
    var tax_pending_round = Math.round(tax_pending);
    $("#tax_pendingId").val(tax_pending_round);

    var remainingMonth = parseInt($("#remainingmonthId").val());
    if (remainingMonth === 0) {
        $("#remainingmonthtaxId").val(tax_pending_round);
    } else {
        $("#remainingmonthtaxId").val(tax_pending_round / remainingMonth);
    }


}
$(document).keypress(
    function(event){
        if (event.which == '13') {
            event.preventDefault();
        }
    });


