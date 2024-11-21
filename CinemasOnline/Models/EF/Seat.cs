﻿using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Seat")]
    public class Seat
    {
        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int SeatID { get; set; }
        public int SeatTypeID { get; set; }
        public int RowID { get; set; }
        public string SeatName { get; set; }
        public virtual SeatType SeatTypeIdNavigation { get; set; }
        public virtual Row RowIdnavigation { get; set; }
    }
}
