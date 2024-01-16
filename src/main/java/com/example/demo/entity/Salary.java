package com.example.demo.entity;

public class Salary {
    String id;
    double basic_salary;
    double performance_salary;
    double performance;
    double actual_salary;

    public String getId() {
        return id;
    }

    public double getBasic_salary() {
        return basic_salary;
    }

    public double getPerformance_salary() {
        return performance_salary;
    }

    public double getPerformance() {
        return performance;
    }

    public void setId(String id) {
        this.id = id;
    }

    public void setBasic_salary(float basic_salary) {
        this.basic_salary = basic_salary;
    }

    public void setPerformance_salary(float preformance_salary) {
        this.performance_salary = preformance_salary;
    }

    public void setPerformance(float preformance) {
        this.performance = preformance;
    }

    public void setActual_salary(double actual_salary) {
        this.actual_salary = actual_salary;
    }


    public double getActual_salary() {
        return actual_salary;
    }
}
