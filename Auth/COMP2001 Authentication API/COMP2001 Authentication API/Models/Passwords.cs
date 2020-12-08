using System;
using System.Collections.Generic;

namespace COMP2001_Authentication_API.Models
{
    public partial class Passwords
    {
        public int PasswordId { get; set; }
        public int UserId { get; set; }
        public string PasswordText { get; set; }
        public DateTime PasswordChanged { get; set; }

        public virtual Users User { get; set; }
    }
}
