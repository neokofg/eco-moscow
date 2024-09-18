"use client";

import * as React from "react";
import { DayPicker } from "react-day-picker";

import { cn } from "@/src/shared/lib/utils";
import { buttonVariants } from "@/src/shared/ui/button";
import {
  ChevronLeftIcon,
  ChevronRightIcon,
  CloseCircleIcon,
} from "@/src/shared/icons";

export type CalendarProps = React.ComponentProps<typeof DayPicker>;

function Calendar({
  className,
  classNames,
  showOutsideDays = false,
  ...props
}: CalendarProps) {
  return (
    <DayPicker
      showOutsideDays={showOutsideDays}
      captionLayout="dropdown-buttons"
      className={cn("py-6 px-4", className)}
      classNames={{
        months: "flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0",
        month: "space-y-4",
        caption:
          "capitalize flex font-semibold text-content-primary pt-1 relative items-center",
        caption_label: "capitalize text-sm font-medium",
        nav: "flex items-center",
        nav_button: cn(
          buttonVariants({ variant: "secondary" }),
          "h-6 w-6 bg-transparent p-0 opacity-50 hover:opacity-100",
        ),
        nav_button_previous: "absolute right-8",
        nav_button_next: "absolute right-[-4px]",
        table: "w-full border-collapse",
        head_row: "flex gap-1",
        head_cell:
          "flex justify-center items-center capitalize text-content-tertiary text-xs font-medium w-[48px] h-[36px]",
        row: "flex w-full mt-2 gap-1",
        cell: "flex justify-center items-center h-[48px] w-[48px] text-center text-sm p-0 rounded-xl relative [&:has([aria-selected].day-range-end)]:rounded-r-md [&:has([aria-selected].day-outside)]:bg-background-green [&:has([aria-selected])]:text-content-green [&:has([aria-selected])]:bg-background-green first:[&:has([aria-selected])]:rounded-l-md last:[&:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20",
        day: cn(
          buttonVariants({ variant: "ghost" }),
          "p-0 font-normal aria-selected:opacity-100",
        ),
        day_range_end: "day-range-end",
        day_selected:
          "bg-background-green text-content-green hover:bg-primary hover:text-primary-foreground focus:bg-primary focus:text-primary-foreground",
        day_today:
          "border border-border-primary h-full flex justify-center items-center",
        day_outside:
          "day-outside text-muted-foreground opacity-50 aria-selected:bg-accent/50 aria-selected:text-muted-foreground aria-selected:opacity-30",
        day_disabled: "text-muted-foreground opacity-50",
        day_range_middle:
          "aria-selected:bg-accent aria-selected:text-accent-foreground",
        day_hidden: "invisible",
        ...classNames,
      }}
      components={{
        IconLeft: () => <ChevronLeftIcon />,
        IconRight: () => <ChevronRightIcon />,
        IconDropdown: () => <CloseCircleIcon />,
      }}
      {...props}
    />
  );
}
Calendar.displayName = "Calendar";

export { Calendar };
