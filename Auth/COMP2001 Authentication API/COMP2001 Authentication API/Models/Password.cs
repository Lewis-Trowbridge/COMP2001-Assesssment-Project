using System;
using System.Collections.Generic;

#nullable disable

namespace COMP2001_Authentication_API.Models
{
    public partial class Password
    {
        public int PasswordId { get; set; }
        public int UserId { get; set; }
        public string PasswordText { get; set; }
        public DateTime PasswordChanged { get; set; }

        public virtual User User { get; set; }
    }
}
